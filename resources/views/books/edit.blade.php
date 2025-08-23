@extends('app')

@section('title', 'Update Book')

@section('content')
<div class="min-h-screen bg-gray-100 p-[30px]">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-4 siemreap-regular">កែសម្រួលសៀវភៅ</h1>
            <p class="text-md text-gray-500 siemreap-regular">កែសម្រួលតែស្តុកសៀវភៅ</p>
        </div>
        <a href="{{ route('books.bookList') }}" class="px-6 py-2.5 rounded-full bg-green-900 text-white font-medium hover:bg-green-800 transition duration-200 inline-flex items-center space-x-2">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            <span class="siemreap-regular">មើលបញ្ជីសៀវភៅ</span>
        </a>
    </div>

    <form action="{{ route('books.update', $book->book_id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-md text-gray-700 mb-1 siemreap-regular">ចំណងជើង</label>
                <input type="text" value="{{ $book->title }}" readonly
                       class="w-full bg-gray-200 border-gray-300 rounded-3xl py-2 px-4 siemreap-regular">
            </div>

            <div>
                <label class="block text-md text-gray-700 mb-1 siemreap-regular">ISBN</label>
                <input type="text" value="{{ $book->isbn }}" readonly
                       class="w-full bg-gray-200 border-gray-300 rounded-3xl py-2 px-4 siemreap-regular">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-md text-gray-700 mb-1 siemreap-regular">ប្រភេទ</label>
                <input type="text" value="{{ $book->category->category_name ?? '-' }}" readonly
                       class="w-full bg-gray-200 border-gray-300 rounded-3xl py-2 px-4 siemreap-regular">
            </div>

            <div>
                <label class="block text-md text-gray-700 mb-1 siemreap-regular">អ្នកនិពន្ធ</label>
                <input type="text" value="{{ $book->authors->pluck('author_name')->join(', ') }}" readonly
                       class="w-full bg-gray-200 border-gray-300 rounded-3xl py-2 px-4 siemreap-regular">
            </div>
        </div>

        <div>
            <label class="block text-md text-gray-700 mb-1 siemreap-regular">សង្ខេប</label>
            <textarea rows="4" readonly
                      class="w-full bg-gray-200 border-gray-300 rounded-3xl py-2 px-4 siemreap-regular">{{ $book->description }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-md text-gray-700 mb-1 siemreap-regular">ឆ្នាំបោះពុម្ព</label>
                <input type="number" value="{{ $book->published_year }}" readonly
                       class="w-full bg-gray-200 border-gray-300 rounded-3xl py-2 px-4 siemreap-regular">
            </div>

            <div>
                <label for="available_stock" class="block text-md text-gray-700 mb-1 siemreap-regular">ស្តុកមាន</label>
                <input type="number" name="available_stock" id="available_stock" value="{{ old('available_stock', $book->available_stock) }}"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular">
                @error('available_stock') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="inline-flex justify-center items-center py-2.5 px-6 space-x-2 border border-transparent text-sm font-medium rounded-full text-white bg-green-900 hover:bg-green-800 transition duration-200 cursor-pointer">
                <span class="siemreap-regular">រក្សាទុក</span>
            </button>
            <a href="{{ route('books.bookList') }}" class="inline-flex justify-center py-2.5 px-6 text-sm font-medium rounded-full bg-gray-400 text-white hover:bg-gray-500 transition duration-200 siemreap-regular">
                បោះបង់
            </a>
        </div>
    </form>
</div>
@endsection
