<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\User;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    public function redirect(Request $request)
{
    $query = $request->input('q');

    // Decide where to go
    if (User::where('full_name', 'like', "%{$query}%")->exists()) {
        return redirect()->route('users.userList');
    }

    if (Book::where('title', 'like', "%{$query}%")->exists()) {
        return redirect()->route('books.bookList');
    }

    if (BorrowRecord::whereHas('user', fn($q) => $q->where('full_name', 'like', "%{$query}%"))
                    ->orWhereHas('book', fn($q) => $q->where('title', 'like', "%{$query}%"))
                    ->exists()) {
        return redirect()->route('borrow-records.index');
    }

    // fallback
    return redirect()->back()->with('error', 'Nothing found for: ' . $query);
}


}