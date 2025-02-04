    <!-- navigation bar -->
     <div id="header" class="transition-all">
      <div class="flex justify-between items-center w-11/12 md:w-4/5 m-auto py-5">
      <a href="{{ route('dynamic.page', ['slug' => '', 'lang' => app()->getLocale() == 'en' ? '':app()->getLocale() ]) }}" class="flex justify-start items-end flex-col">
        <img src="{{ url('storage/assets/MAKANI.jpg') }}" class="h-[60px] w-[60px]" />
      </a>

      <div class="nav-links flex justify-start items-center flex-row gap-[30px] z-50">

        <a href="{{ route('dynamic.page', ['slug' => '', 'lang' => app()->getLocale() == 'en' ? '':app()->getLocale() ]) }}" class="flex justify-start items-end flex-col sm:hidden">
          <img src="{{ url('storage/assets/MAKANI.jpg') }}" class="h-[60px] w-[60px]" />
        </a>

        {{-- <a href="./index.html" class="font-[Ping_AR_+_LT] active-link text-base font-normal leading-[19px] text-[#2c64e3]" >الرئيسية</a>
        <a href="./categorys.html" class="font-[Ping_AR_+_LT] text-base font-normal leading-[19px] text-[#333333]" >الخدمات</a>
        <a href="./about-us.html" class="font-[Ping_AR_+_LT] text-base font-normal leading-[19px] text-[#333333]" >نبذة عنا</a> --}}
        @foreach ($navbarLinks as $navbarLink)
        @if (in_array($navbarLink->controller_name, ['HomePageController', 'ServicePageController','AboutPageController']))
            <a href="{{ route('dynamic.page', ['lang' => app()->getLocale() == 'en' ? '' : app()->getLocale(), 'slug' => $navbarLink->slug]) }}"
               class="nav-link capitalize {{ session('active_navbar_link') === $navbarLink->slug ? 'active-link text-base font-normal leading-[19px] text-[#2c64e3]' : 'text-base font-normal leading-[19px] text-[#333333]' }}">
                {{ $navbarLink->title }}
            </a>
        @endif
      @endforeach


          @if (app()->getLocale() == 'en')
          <a href="{{  route('dynamic.page', ['slug' => 'contact-us', 'lang' => '']) }}" class="sm:hidden border bg-transparent font-[Ping_AR_+_LT] font-medium leading-[19px] text-[#2c64e3] min-w-[100px] h-[49px] w-[151px] inline-flex items-center justify-center gap-[3px] rounded-lg border-solid border-[#2c64e3]">
            <span>Contact Us</span>
          @else
          <a href="{{  route('dynamic.page', ['slug' => 'تواصل-معنا', 'lang' =>  app()->getLocale()]) }}" class="sm:hidden border bg-transparent font-[Ping_AR_+_LT] font-medium leading-[19px] text-[#2c64e3] min-w-[100px] h-[49px] w-[151px] inline-flex items-center justify-center gap-[3px] rounded-lg border-solid border-[#2c64e3]">
            <span>تواصل معنا</span>
          @endif
          <div class="w-6 h-6 flex">
            <img src="{{ url('storage/assets/message.svg') }}" alt="messages" />
          </div>
        </a>

        <div class="close-side-bar sm:hidden absolute top-3 left-3">
          <button class="w-8"><img src="{{ url('storage/assets/close.png') }}" alt=""></button>
        </div>
      </div>


      <div class="flex items-center gap-3">
        @if (app()->getLocale() == 'en')
        <a href="{{  route('dynamic.page', ['slug' => 'contact-us', 'lang' => '']) }}" class="border bg-transparent font-medium text-[#2c64e3] min-w-[100px] h-[49px] w-[151px] hidden sm:inline-flex items-center justify-center gap-[3px] rounded-lg border-solid border-[#2c64e3]">
            <span>Contact Us</span>
        @else
        <a href="{{  route('dynamic.page', ['slug' => 'contact-us', 'lang' => app()->getLocale()]) }}" class="border bg-transparent font-medium text-[#2c64e3] min-w-[100px] h-[49px] w-[151px] hidden sm:inline-flex items-center justify-center gap-[3px] rounded-lg border-solid border-[#2c64e3]">
            <span>تواصل معنا</span>
        @endif
          <!-- <span>contact us</span> -->
          <div class="w-6 h-6 flex">
            <img src="{{ asset('storage/assets/message.svg') }}" alt="messages" />
          </div>
        </a>

          <!-- language picker -->
     <!-- language picker -->
     <div class="custom-select relative w-[100px] cursor-pointer">
        <div
          class="selected-option flex items-center p-2 border border-gray-300 rounded bg-white rounded-lg"
        >
          <img
            src="https://flagcdn.com/w320/gb.png"
            alt="English Flag"
            class="flag-icon w-[20px] h-[15px] mr-2"
          />
          English
        </div>
        <ul class="options">
            <li data-value="ar">
              <img
                src="https://flagcdn.com/w320/eg.png"
                alt="Arabic Flag"
                class="flag-icon w-[20px] h-[15px] mr-2"
              />
              <a class="language-picker"
                href="javascript:void(0)"
                data-lang="ar"
              >
                العربية
              </a>
            </li>
            <li data-value="en">
              <img
                src="https://flagcdn.com/w320/gb.png"
                alt="English Flag"
                class="flag-icon w-[20px] h-[15px] mr-2"
              />
              <a class="language-picker"
                href="javascript:void(0)"
                data-lang="en"
              >
                English
              </a>
            </li>
          </ul>
      </div>


        <!-- toggle side bar links -->
          <!-- toggle side bar links -->
          <button class="btn-sidebarToggle hidden items-center justify-center border border-[#2c64e3] h-[49px] w-[49px] rounded-lg p-1">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 12h18M3 6h18M3 18h18" stroke="#2C64E3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
      </div>
     </div>


    </div>
