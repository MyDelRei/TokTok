@extends('app')

@section('title', 'Checkin')

@section('content')
<section class="max-w-6xl mx-auto p-10">
      <form action="">
         <div class="flex flex-col mb-10">
            <label for="user_id" class="siemreap-regular ml-2">លេខសមាជិក</label>
            <input type="text" name="user_id" id="user_id" placeholder="បញ្ចូលលេខសមាជិក"
            class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
         </div>
         <div class="flex flex-col mb-10">
            <label for="isbn" class="siemreap-regular ml-2">ISBN</label>
            <input type="text" name="isbn" id="isbn" placeholder="បញ្ចូលលេខសៀវភៅ"
            class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
         </div>
           <div class="flex flex-col mb-10">
            <label for="qty" class="siemreap-regular ml-2">ចំនួន</label>
            <input type="number" name="qty" id="qty" placeholder="បញ្ចូលចំនួន"
            class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
         </div>
         <div class="flex items-center gap-5 max-sm:gap-2">
            <div class="flex flex-col mb-5 w-3/4 ">
               <label for="fee" class="siemreap-regular ml-2">ផាក</label>
               <input type="text" name="fee" id="fee" placeholder="0.00"
               class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
            </div>  
            <div class="w-1/4">
               <button class="w-full flex items-center justify-center gap-2 siemreap-regular bg-green-900 text-white px-2 py-3 rounded-full cursor-pointer hover:bg-green-800 transition duration-200">
               
                  បន្ត
               <svg class="" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5 12H19" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12 5L19 12L12 19" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
               </button>
            </div> 
         </div>

      </form>
   </section>
@endsection