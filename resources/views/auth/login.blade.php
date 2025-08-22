<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

@include('sweetalert::alert') 

<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="p-8 rounded-2xl flex flex-col items-center w-full max-w-lg mx-auto">
        <!-- Logo and App Name Section -->
        <div class="flex flex-col items-center mb-6">
            <!-- Logo Image -->
            <img 
                src="{{ asset('img/logo.png') }}" 
                alt="App Logo" 
                class="w-[130px] h-[130px] mb-4"
                onerror="this.src='https://placehold.co/130x130/2f5b4d/ffffff?text=LOGO';"
            >
            <!-- App Name as an Image -->
            <img 
                src="{{ asset('img/stylingFont.png') }}" 
                alt="App Name" 
                class="w-full h-full mb-4 max-w-xs"
                onerror="this.src='https://placehold.co/300x80/2f5b4d/ffffff?text=APP+NAME';"
            >
        </div>
        
        <!-- Form Section -->
        <form action="{{ route('login.post') }}" method="POST" class="w-full max-w-md flex flex-col items-center">
            @csrf
            <!-- Input and Button Row -->
            <div class="flex items-center justify-center w-full  p-2 rounded-full">
                <!-- User ID Input -->
                <div class="flex-grow flex items-center justify-start mr-2">
                    <input 
                        type="text" 
                        id="user_id" 
                        name="user_id" 
                        value="{{ old('user_id') }}" 
                        required
                        placeholder="លេខសមាជិក" 
                        class="block w-full h-[80px] rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-[#2F5B4D] focus:border-[#2F5B4D] text-[19px] siemreap-regular"
                    >
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-[160px] h-[80px] rounded-full flex items-center justify-center py-2 px-4 border border-transparent text-[19px] font-medium text-white bg-[#2F5B4D] hover:bg-[#254b3e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2F5B4D]"
                >
                    <span class="text-white siemreap-regular text-[26px]">បន្ត</span><i class="fa-solid fa-caret-right mx-2 text-[32px]"></i>
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>