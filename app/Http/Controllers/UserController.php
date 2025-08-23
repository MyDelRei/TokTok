<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
class UserController extends Controller
{

    public function userList(Request $request)
    {
        $query = User::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(8)->withQueryString();

        $deleteConfig = [
            'title' => 'Are you sure to delete this user?',
            'html' => '<div style="text-align: left;">
                        <p style="margin-bottom: 10px; text-align: center;">You will delete the following user</p>
                    </div>',
            'icon' => 'warning',
            'showCancelButton' => true,
            'confirmButtonColor' => '#830000ff',
            'cancelButtonColor' => '#969696ff',
            'confirmButtonText' => 'Yes, Delete!',
            'cancelButtonText' => 'Cancel',
            'reverseButtons' => true,
            'focusCancel' => true
        ];

        session(['alert.delete' => json_encode($deleteConfig)]);

        return view('users.userList', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:9',
        ],
        [
        'phone.min' => 'លេខទូរស័ព្ទត្រូវតែមានយ៉ាងតិច ៩ តួអក្សរ',
            'email.unique'=>'អុីម៉ែលត្រូវបានប្រើប្រាស់រួចហើយ'
    ]);


        User::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => 'member'
        ]);

        Alert::success('Success', 'User created successfully');
        return redirect()->route('users.userList')->with('alert.config', json_encode([
            'title' => 'សមាជិកត្រូវបានបន្ថែម!',
            'icon' => 'success',
            'confirmButtonText' => 'យល់ព្រម'
        ]));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|min:9'
        ],[
            'phone'=>'លេខទូរស័ព្ទត្រូវតែមានយ៉ាងតិច ៩ តួអក្សរ'
        ]);
        $user->update($validated);

        Alert::success('Success', 'User updated successfully');
        return redirect()->route('users.userList')->with('alert.config', json_encode([
            'title' => 'សមាជិកត្រូវបានកែប្រែ!',
            'icon' => 'success',
            'confirmButtonText' => 'យល់ព្រម'
        ]));
    }

     public function destroy(User $user)
    {
        $userName = $user->full_name;
        $user->delete();

        Alert::success('Success!', "Deleted successfully!")
             ->persistent(false)
             ->autoClose(2000);

        return redirect()->route('users.userList');
    }

    //== == == Print to pdf function == == ==

    public function printPreview()
    {
        $users = User::all();
        return view('users.print-preview', compact('users'));
    }

    public function printPdf(Request $request)
    {
        $printOption = $request->input('print_option', 'all');
        $customLimit = $request->input('custom_limit', 10);

        $query = User::query();

        switch ($printOption) {
            case 'custom':
                $users = $query->limit($customLimit)->get();
                break;
            case 'all':
            default:
                $users = $query->get();
                break;
        }

        $pdf = Pdf::loadView('users.pdf', compact('users'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('users-' . $printOption . '.pdf');
    }
}
