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
      <aside class="h-screen flex flex-col justify-between bg-gray-50">
          <nav class="mt-5 px-2">

              <!-- Dashboard link -->
              <a
                  href="{{ route('dashboard') }}"
                  class="group flex items-center px-2 py-2 text-base font-medium rounded-md
                      {{ Request::routeIs('dashboard') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} siemreap-regular"
              >
              <i class="text-xl mx-2 fa-solid fa-table"></i>
                  កម្រងទិន្នន័យ
              </a>

              <!-- Users link -->
              <a
                  href="{{ route('users.userList') }}"
                  class="mt-1 group flex items-center px-2 py-2 text-base font-medium rounded-md
                      {{ Request::routeIs('users.*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} siemreap-regular"
              >
              <i class="text-xl mx-2 fa-solid fa-people-line"></i>
                  សមាជិក
              </a>

              <!-- Books link -->
              <a
                  href="{{ route('books.bookList') }}"
                  class="mt-1 group flex items-center px-2 py-2 text-base font-medium rounded-md
                      {{ Request::routeIs('books.*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} siemreap-regular"
              >
              <i class="text-xl mx-2 fa-solid fa-book"></i>
                  បន្ថែមសៀវភៅ
              </a>

              <!-- Example other link -->
              <a
    href="{{ route('borrow-records.index') }}"
    class="mt-1 group flex items-center px-2 py-2 text-base font-medium rounded-md
        text-gray-600 {{ Request::routeIs('borrow_records.*') ? 'bg-green-900 text-white' : 'hover:bg-gray-50 hover:text-gray-900' }} siemreap-regular"
>
    <i class="text-xl mx-2 fa-solid fa-calendar-check"></i>
    ឆែកសៀវភៅ
</a>
          </nav>

          <div class="relative bottom-[100px] mx-5 cursor-pointer">
              <i class="fa-solid fa-arrow-right-from-bracket rotate-180 text-sm text-red-900"></i>
              <a href="{{ route('logout') }}" class="font-semibold py-2 text-gray-700 siemreap-regular">ចាកចេញ</a>
          </div>
      </aside>
    </section>


    <!-- Main Content -->
    <section class="basis-5/6 bg-gray-50">
        @yield('content')
    </section>
  </section>
