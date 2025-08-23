@extends('app')

@section('title', 'Add Book')

@section('content')
<div class="min-h-screen bg-gray-100 p-[30px]">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-4 siemreap-regular">បន្ថែមសៀវភៅ</h1>
            <p class="text-md text-gray-500 siemreap-regular">បំពេញព័ត៌មានសៀវភៅ</p>
        </div>
        <a href="{{ route('books.bookList') }}" class="px-6 py-2.5 rounded-full bg-green-900 text-white font-medium hover:bg-green-800 transition duration-200 inline-flex items-center space-x-2">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            <span class="siemreap-regular">មើលបញ្ជីសៀវភៅ</span>
        </a>
    </div>

    <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-md text-gray-700 mb-1 siemreap-regular">ចំណងជើង</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="ចំណងជើងសៀវភៅ"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" required>
                @error('title') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="isbn" class="block text-md text-gray-700 mb-1 siemreap-regular">ISBN</label>
                <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" placeholder="ISBN"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" required>
                @error('isbn') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category_id" class="block text-md text-gray-700 mb-1 siemreap-regular">ប្រភេទ</label>
                <select name="category_id" id="category_id" class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" required>
                    <option value="">-- ជ្រើសប្រភេទ --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="author_name" class="block text-md text-gray-700 mb-1 siemreap-regular">អ្នកនិពន្ធ</label>
                <input type="text" name="author_name" id="author_name" value="{{ old('author_name') }}"
                       placeholder="ឈ្មោះអ្នកនិពន្ធ (e.g., Josh Kim & Malita Roush)"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" required>
                @error('author_name') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            
        </div>

        <div>
            <label for="description" class="block text-md text-gray-700 mb-1 siemreap-regular">សង្ខេប</label>
            <textarea name="description" id="description" rows="4" placeholder="សង្ខេបសៀវភៅ"
                      class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular">{{ old('description') }}</textarea>
            @error('description') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="published_year" class="block text-md text-gray-700 mb-1 siemreap-regular">ឆ្នាំបោះពុម្ព</label>
                <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}" placeholder="YYYY"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" required>
                @error('published_year') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="available_stock" class="block text-md text-gray-700 mb-1 siemreap-regular">ស្តុកមាន</label>
                <input type="number" name="available_stock" id="available_stock" value="{{ old('available_stock', 0) }}" placeholder="0"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular">
                @error('available_stock') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="inline-flex justify-center items-center py-2.5 px-6 space-x-2 border border-transparent text-sm font-medium rounded-full text-white bg-green-900 hover:bg-green-800 focus:outline-none transition duration-200 cursor-pointer">
                <span class="siemreap-regular">រក្សាទុក</span>
            </button>
            <a href="{{ route('books.bookList') }}" class="inline-flex justify-center py-2.5 px-6 text-sm font-medium rounded-full bg-gray-400 text-white hover:bg-gray-500 transition duration-200 siemreap-regular">
                បោះបង់
            </a>
        </div>
    </form>
</div>
@endsection
