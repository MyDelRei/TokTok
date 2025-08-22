<header class="bg-white shadow-sm">
    <div class="flex items-center justify-between h-16 border-b border-gray-200 px-4 md:px-8">
        <!-- Logo + Search -->
        <div class="flex items-center gap-4 md:gap-6 flex-1">
            <!-- Logos -->
            <div class="flex items-center gap-2 md:gap-4">
                <img 
                    src="{{ asset('img/logo-2.png') }}" 
                    alt="App Logo" 
                    class="w-[30px] h-[30px] object-contain"
                    onerror="this.src='https://placehold.co/130x130/2f5b4d/ffffff?text=LOGO';"
                >
                <img 
                    src="{{ asset('img/stylingFont.png') }}" 
                    alt="App Logo Font" 
                    class="w-[70px] object-contain"
                    onerror="this.src='https://placehold.co/130x130/2f5b4d/ffffff?text=LOGO';"
                />
            </div>

            <!-- Search Bar -->
            <div class="relative flex-1 max-w-md">
                <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-600">
                    <svg
                        class="h-4 w-4 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 56.966 56.966"
                    >
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 
                            s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 
                            c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 
                            s-17-7.626-17-17S14.61,6,23.984,6z"
                        />
                    </svg>
                </button>
                <input
                    type="search"
                    name="search"
                    placeholder="ស្វែងរក..."
                    class="w-full h-9.5 pl-10 pr-4 rounded-full border border-gray-300 bg-white text-sm focus:outline-none focus:ring-1 focus:ring-green-800 siemreap-regular"
                />
            </div>
        </div>

        <!-- Notification -->
        <div class="flex items-center space-x-4">
            <i class="fa-regular fa-bell text-green-900 text-2xl cursor-pointer hover:text-green-700 transition-colors"></i>
        </div>
    </div>
</header>
  

  <section class="flex flex-row h-screen">
    <!-- Sidebar -->
    <section class="basis-1/6 border-r border-gray-100">
      <aside
        class="h-screen flex flex-col justify-between bg-gray-50"
      >
        <nav class="mt-5 px-2">
          <a
            href="#"
            class="group flex items-center px-2 py-2 text-base font-medium rounded-md bg-green-900 text-white siemreap-regular"
          >
            <svgsiemreap-regular
              class="mr-3 h-6 w-6 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
              />
            </svgsiemreap-regular>
            កម្រងទិន្នន័យ
          </a>
          <a
            href="{{route('users.userList')}}"
            class="mt-1 group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900 siemreap-regular"
          >
            <svg
              class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
              />
            </svg>
            សមាជិក
          </a>
          <a
            href="#"
            class="mt-1 group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900 siemreap-regular"
          >
            <svg
              class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
              />
            </svg>
            បន្ថែមសៀវភៅ
          </a>
          <a
            href="#"
            class="mt-1 group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900 siemreap-regular"
          >
            <svg
              class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
              />
            </svg>
            ឆែកសៀវភៅ
          </a>
        </nav>
        <div class="relative bottom-[100px] mx-5 cursor-pointer">
          <i
            class="fa-solid fa-arrow-right-from-bracket rotate-180 text-sm text-red-900"
          ></i>
          <a href="{{route('logout')}}" class="font-semibold py-2 text-gray-700 siemreap-regular"
            >ចាកចេញ</a
          >
        </div>
      </aside>
    </section>
    <!-- Main Content -->
    <section class="basis-5/6 bg-gray-50">
        @yield('content')
    </section>
  </section>