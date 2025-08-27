<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
{
    $totalBooks = Book::sum('available_stock');
    $totalMembers = User::where('role', 'member')->count();
    $borrowBooks = BorrowRecord::where('borrow_status', 'checked_out')->sum('quantity');
    $checkInBooks = BorrowRecord::where('borrow_status', 'checked_in')->sum('quantity');
    $overdue = BorrowRecord::where('borrow_status', 'over_due')->count();
    $lostBooks = BorrowRecord::where('borrow_status', 'over_due')->count(); // placeholder if you add lost later
    $revenue = BorrowRecord::sum('penalty');
    $totalVisitors = User::where('role', 'member')->count();

    // 📌 Table 1: Overdue records
    $overdueRecords = BorrowRecord::with(['book', 'user'])
        ->where('borrow_status', 'over_due')
        ->latest()
        ->take(10)
        ->get();

    // 📌 Table 2: Check-out transactions
    $checkoutRecords = BorrowRecord::with(['book', 'user'])
        ->where('borrow_status', 'checked_out')
        ->latest()
        ->take(10)
        ->get();

    $months = collect(range(1, 12))->map(fn($m) => Carbon::create()->month($m)->format('M'));

    $checkedOutData = [];
    $checkedInData = [];

    foreach (range(1, 12) as $month) {
        $checkedOutData[] = BorrowRecord::where('borrow_status', 'checked_out')
            ->whereMonth('check_out_date', $month)
            ->whereYear('check_out_date', now()->year)
            ->count();

        $checkedInData[] = BorrowRecord::where('borrow_status', 'checked_in')
            ->whereMonth('check_in_date', $month)
            ->whereYear('check_in_date', now()->year)
            ->count();
    }

    // dd([
    //     'months' => $months,
    //     'checkedOutData' => $checkedOutData,
    //     'checkedInData' => $checkedInData
    // ]);

        
    

    return view('dashboard', compact(
        'totalBooks',
        'totalMembers',
        'borrowBooks',
        'checkInBooks',
        'overdue',
        'lostBooks',
        'revenue',
        'totalVisitors',
        'overdueRecords',
        'checkoutRecords',
        'months',
        'checkedOutData',
        'checkedInData'
    ));
}


}