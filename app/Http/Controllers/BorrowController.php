<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon; // <-- for date calculations

class BorrowController extends Controller
{
    /**
     * Show borrow record list with search + sweet alert.
     */
    public function index(Request $request)
    {
        $query = BorrowRecord::with(['book', 'user']); // eager load

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->whereHas('book', function($sub) use ($search) {
                        $sub->where('title', 'like', "%{$search}%")
                            ->orWhere('isbn', 'like', "%{$search}%");
                    })
                  ->orWhereHas('user', function($sub) use ($search) {
                        $sub->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                  ->orWhere('borrow_status', 'like', "%{$search}%");
            });
        }

        $records = BorrowRecord::with(['book.author', 'user'])->get();

        // SweetAlert delete confirmation
        $deleteConfig = [
            'title' => 'តើអ្នកប្រាកដថាចង់លុបទិន្នន័យខ្ចីសៀវភៅមែនទេ?',
            'html' => '<div style="text-align: left;">
                          <p style="margin-bottom: 10px; text-align: center;">
                          អ្នកកំពុងត្រៀមលុបទិន្នន័យខ្ចីសៀវភៅនេះ
                          </p>
                      </div>',
            'icon' => 'warning',
            'showCancelButton' => true,
            'confirmButtonColor' => '#830000ff',
            'cancelButtonColor' => '#969696ff',
            'confirmButtonText' => 'បាទ/ចាស, លុប!',
            'cancelButtonText' => 'បោះបង់',
            'reverseButtons' => true,
            'focusCancel' => true
        ];

        session(['alert.delete' => json_encode($deleteConfig)]);

        return view('borrow-records.index', compact('records'));
    }


    public function create()
    {
        $books = Book::all();
        $users = User::query()->get();

        return view('borrow-records.create', compact('books', 'users'));
    }


    public function store(Request $request)
    {
        // validate input (remove check_in_date, it will be auto)
        $request->validate([
            'user_id'        => 'required',
            'book_id'        => 'required',
            'quantity'       => 'required|integer|min:1',
            'check_out_date' => 'required|date',
        ]);

        // auto set check_in_date = check_out_date + 7 days
        $checkOutDate = Carbon::parse($request->check_out_date);
        $checkInDate  = $checkOutDate->copy()->addDays(7);

        // create record
        BorrowRecord::create([
            'user_id'        => $request->user_id,
            'book_id'        => $request->book_id,
            'quantity'       => $request->quantity,
            'borrow_status'  => 'checked_out',
            'check_out_date' => $checkOutDate,
            'check_in_date'  => $checkInDate,
            'penalty'        => 0, // default 0
        ]);

        return redirect()->route('borrow-records.index')
                         ->with('success', 'Borrow record created successfully!');
    }


    /**
     * Edit borrow record.
     */
    public function edit($br_id)
    {
        $borrowRecord = BorrowRecord::findOrFail($br_id);
        $users = User::all();
        $books = Book::all();

        return view('borrow-records.edit', compact('borrowRecord', 'users', 'books'));
    }

    /**
     * Update borrow record.
     */
    public function update(Request $request, $br_id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'book_id' => 'required|exists:books,book_id',
            'quantity' => 'required|integer|min:1',
            'check_out_date' => 'required|date',
            'borrow_status' => 'required|in:checked_out,checked_in,over_due',
        ]);

        $borrowRecord = BorrowRecord::findOrFail($br_id);

        // auto set check_in_date = check_out_date + 7 days
        $checkOutDate = Carbon::parse($request->check_out_date);
        $checkInDate  = $checkOutDate->copy()->addDays(7);

        // calculate penalty if returned after check_in_date
        $penalty = 0;
        if ($request->borrow_status === 'checked_in') {
            $actualReturnDate = Carbon::now();
            if ($actualReturnDate->gt($checkInDate)) {
                $daysOverdue = $actualReturnDate->diffInDays($checkInDate);
                $penalty = $daysOverdue * 0.5;
            }
        }

        $borrowRecord->update([
            'user_id'        => $validated['user_id'],
            'book_id'        => $validated['book_id'],
            'quantity'       => $validated['quantity'],
            'check_out_date' => $checkOutDate,
            'check_in_date'  => $checkInDate,
            'borrow_status'  => $validated['borrow_status'],
            'penalty'        => $penalty,
        ]);

        return redirect()
            ->route('borrow-records.index')
            ->with('success', 'Borrow record updated successfully.');
    }

    /**
     * Delete borrow record.
     */
    public function destroy($br_id)
    {
        $record = BorrowRecord::findOrFail($br_id);
        $record->delete();

        return redirect()->route('borrow-records.index')->with('alert.config', json_encode([
            'title' => 'បានលុបទិន្នន័យខ្ចីសៀវភៅ!',
            'text' => "ការខ្ចីសៀវភៅ #{$record->br_id} ត្រូវបានលុបដោយជោគជ័យ",
            'icon' => 'success',
            'confirmButtonText' => 'OK'
        ]));
    }
}
