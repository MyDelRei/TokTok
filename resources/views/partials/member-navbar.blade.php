<section>
      <div class="flex justify-center items-center space-x-10 max-sm:space-x-0 p-[50px]">
         <img src="{{ asset('img/logo-2.png') }}" 
         class="w-32 h-32 object-contain max-sm:w-15 max-sm:h-15"
         alt="logo"
         onerror="this.src='https://placehold.co/130x130/2f5b4d/ffffff?text=LOGO';">
         <img src="{{ asset('img/stylingFont.png') }}"
         class="w-[250px] h-[100px] object-contain max-sm:w-[150px] max-sm:h-[50px]"
          alt="logo"
          onerror="this.src='https://placehold.co/130x130/2f5b4d/ffffff?text=LOGO';">
      </div>
   </section>
   <section class="mt-10">
     
      @yield('content')
   </section>