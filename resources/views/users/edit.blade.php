@extends('app')

@section('title', 'Update User')

@section('content')

    <div class="bg-gray-100 p-[30px] min-h-screen">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 mb-4 siemreap-regular">កែសម្រួលសមាជិក</h1>
                <p class="text-md text-gray-500 siemreap-regular">កែសម្រួលព័ត៌មាន</p>
            </div>
            <div>
                <a href="{{ route('users.userList') }}"
                   class="px-6 py-2.5 rounded-full bg-[#1E3B2D] text-white font-medium hover:bg-[#2e5940] transition duration-200 inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <span class="siemreap-regular">មើលបញ្ជីសមាជិក</span>
                </a>
            </div>
        </div>

        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="full_name" class="block text-md text-gray-700 mb-1 siemreap-regular">ឈ្មោះ</label>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}"
                           placeholder="ឈ្មោះ"
                           class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular" required>
                    @error('full_name') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="block text-md text-gray-700 mb-1 siemreap-regular">អ៊ីមែល</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                           placeholder="អ៊ីមែល"
                           class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular" required>
                    @error('email') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="phone" class="block text-md text-gray-700 mb-1 siemreap-regular">លេខទូរស័ព្ទ</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                       placeholder="លេខទូរស័ព្ទ"
                       class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800 transition duration-200 siemreap-regular" required>
                @error('phone') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="inline-flex justify-center items-center py-2.5 px-6 space-x-2 border border-transparent text-sm font-medium rounded-full text-white bg-green-900 hover:bg-green-700 focus:outline-none transition duration-200 siemreap-regular">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                    <span>កែសម្រួល</span>
                </button>
                <a href="{{ route('users.userList') }}" class="inline-flex justify-center py-2.5 px-6 text-sm font-medium rounded-full bg-gray-300 text-black hover:bg-gray-500 transition duration-200 siemreap-regular">
                    បោះបង់
                </a>
            </div>
        </form>
    </div>
@endsection
