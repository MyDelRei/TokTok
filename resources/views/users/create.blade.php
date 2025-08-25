@extends('app')

@section('title', 'Add user')

@section('content')
    <div class="min-h-screen bg-gray-100 p-[30px]">
         <div class="flex justify-between items-center mb-6">
               <div>
                  <h1 class="text-2xl font-bold text-gray-900 mb-4 siemreap-regular">បន្ថែមសមាជិក</h1>
                  <p class="text-md text-gray-500 siemreap-regular">បំពេញព័ត៌មាន</p>
               </div>
               <a href="{{ route('users.userList') }}" class="px-6 py-2.5 rounded-full bg-green-900 text-white font-medium hover:bg-green-800 transition duration-200 inline-flex items-center space-x-2">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                     <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <span class="siemreap-regular">មើលបញ្ជីសមាជិក</span>
               </a>
         </div>

         <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                  @csrf

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <div>
                        <label for="full_name" class="block text-md text-gray-700 mb-1 siemreap-regular">ឈ្មោះ</label>
                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                 placeholder="ឈ្មោះ"
                                 class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" >
                        @error('full_name') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
                     </div>
                     <div>
                        <label for="email" class="block text-md text-gray-700 mb-1 siemreap-regular">អ៊ីមែល</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                 placeholder="អ៊ីមែល"
                                 class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular" >
                        @error('email') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
                     </div>
                  </div>

                  <div>
                     <label for="phone" class="block text-md text-gray-700 mb-1 siemreap-regular">លេខទូរស័ព្ទ</label>
                     <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                           placeholder="លេខទូរស័ព្ទ"
                           class="w-full bg-white border-gray-300 rounded-3xl py-2 px-4 shadow-sm focus:outline-none focus:border-[#1E3B2D] focus:ring-1 focus:ring-[#1E3B2D] transition duration-200 siemreap-regular">
                     @error('phone') <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> @enderror
                  </div>

                  <div class="flex items-center space-x-4 pt-4">
                     <button type="submit" class="inline-flex justify-center items-center py-2.5 px-6 space-x-2 border border-transparent text-sm font-medium rounded-full text-white bg-green-900 hover:bg-green-800 focus:outline-none transition duration-200 cursor-pointer">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7zM7 7h7v2H7V7zm10 10H7v-2h10v2zm0-4H7v-2h10v2z"/>
                        </svg>
                        <span class="siemreap-regular">រក្សាទុក</span>
                     </button>
                     <a href="{{ route('users.userList') }}" class="inline-flex justify-center py-2.5 px-6 text-sm font-medium rounded-full bg-gray-400 text-white hover:bg-gray-500 transition duration-200 siemreap-regular">
                        បោះបង់
                     </a>
                  </div>

         </form>
    </div>
@endsection
