@extends('app')

@section('title', 'Edit Borrow Record')

@section('content')
<div class="bg-gray-100 p-[30px] min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-4 siemreap-regular">កែប្រែការខ្ចីសៀវភៅ</h1>
            <p class="text-md text-gray-500 siemreap-regular">កែប្រែព័ត៌មានការខ្ចីសៀវភៅ</p>
        </div>
        <a href="{{ route('borrow-records.index') }}"
           class="px-6 py-2.5 rounded-full bg-[#1E3B2D] text-white font-medium hover:bg-[#2e5940] transition duration-200 inline-flex items-center space-x-2">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
            <span class="siemreap-regular">ត្រលប់</span>
        </a>
    </div>

    <form action="{{ route('borrow-records.update', $borrowRecord->br_id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User -->
            <div>
                <label for="user_id" class="block text-md text-gray-700 mb-1 siemreap-regular">សមាជិក</label>
                <select name="user_id" id="user_id"
                        class="user-select w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular">
                    <option value="">-- ជ្រើសរើស --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->user_id }}" {{ $borrowRecord->user_id == $user->user_id ? 'selected' : '' }}>
                            {{ $user->name }} - {{ $user->email }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Book -->
            <div>
                <label for="book_id" class="block text-md text-gray-700 mb-1 siemreap-regular">សៀវភៅ</label>
                <select name="book_id" id="book_id"
                        class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular">
                    <option value="">-- ជ្រើសរើស --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->book_id }}" {{ $borrowRecord->book_id == $book->book_id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
                @error('book_id') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Quantity -->
            <div>
                <label for="quantity" class="block text-md text-gray-700 mb-1 siemreap-regular">ចំនួន</label>
                <input type="number" id="quantity" name="quantity" min="1"
                       value="{{ old('quantity', $borrowRecord->quantity) }}"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular">
                @error('quantity') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Borrow Status -->
            <div>
                <label for="borrow_status" class="block text-md text-gray-700 mb-1 siemreap-regular">ស្ថានភាព</label>
                <select name="borrow_status" id="borrow_status"
                        class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular">
                    <option value="checked_out" {{ $borrowRecord->borrow_status === 'checked_out' ? 'selected' : '' }}>Checked Out</option>
                    <option value="checked_in" {{ $borrowRecord->borrow_status === 'checked_in' ? 'selected' : '' }}>Checked In</option>
                    <option value="over_due" {{ $borrowRecord->borrow_status === 'over_due' ? 'selected' : '' }}>Over Due</option>
                </select>
                @error('borrow_status') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Check Out Date -->
            <div>
                <label for="check_out_date" class="block text-md text-gray-700 mb-1 siemreap-regular">ថ្ងៃខ្ចី</label>
                <input type="date" id="check_out_date" name="check_out_date"
                       value="{{ old('check_out_date', $borrowRecord->check_out_date) }}"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular">
                @error('check_out_date') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Check In Date -->
            <div>
                <label for="check_in_date" class="block text-md text-gray-700 mb-1 siemreap-regular">ថ្ងៃសង</label>
                <input type="date" id="check_in_date" name="check_in_date"
                       value="{{ old('check_in_date', $borrowRecord->check_in_date) }}"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular">
                @error('check_in_date') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4 pt-4">
            <button type="submit"
                    class="inline-flex justify-center items-center py-2.5 px-6 space-x-2 border border-transparent text-sm font-medium rounded-full text-white bg-green-900 hover:bg-green-700 focus:outline-none transition duration-200 siemreap-regular">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path d="M12 20h9"/>
                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                </svg>
                <span>កែប្រែ</span>
            </button>
            <a href="{{ route('borrow-records.index') }}"
               class="inline-flex justify-center py-2.5 px-6 text-sm font-medium rounded-full bg-gray-300 text-black hover:bg-gray-500 transition duration-200 siemreap-regular">
                បោះបង់
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.user-select').select2({
            placeholder: "-- ជ្រើសរើស --",
            allowClear: true,
            width: '100%'
        });
    });     
</script>
@endpush
