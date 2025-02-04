   <!-- footer -->
       <!-- done -->
       <section class="footer bg-[#333333] py-[64px]">
        <div class="w-11/12 md:w-4/5 m-auto">
          <div class="flex justify-between flex-wrap ">

            <div class="w-[450px] flex flex-col gap-[28px]">
              <img src="{{ url('storage/assets/MAKANI.jpg') }}" width="70" height="50" alt="شعار" />

              <div class="address">
                <div class="title items-stretch font-semibold text-[#FBFCF8] mt-1">العنوان:</div>
                <p class="text-[#FBFCF8] font-[100]">المستوى 1، 12 شارع العينة، سيدني NSW 2000</p>
              </div>

              <div class="contact">
                <div class="title items-stretch font-semibold text-[#FBFCF8]">الاتصال:</div>
                <p class="text-[#FBFCF8] font-[100] mt-1">+20 1007 8155 7</p>
                <a href="mailto:Makanialain33@gmail.com" class="text-[#FBFCF8] font-[100]">Makanialain33@gmail.com</a>
                </div>
              <!-- social media -->
              <div class="social-media-icons flex gap-[12px]">
                <a href="https://www.facebook.com" target="_blank"><img src="{{ url('storage/assets/Facebook .png') }}" width="25" height="25" alt="" /></a>
                <a href="https://www.instagram.com/makani_uae2024" target="_blank"><img src="{{ url('storage/assets/Instagram.png') }}" width="25" height="25" alt="" /></a>
                <a href="https://www.linkedin.com" target="_blank"><img src="{{ url('storage/assets/LinkedIn.png') }}" width="25" height="25" alt="" /></a>
                <a href="https://twitter.com" target="_blank"><img src="{{ url('storage/assets/X.png') }}" width="25" height="25" alt="" /></a>
                {{-- <a href="https://www.youtube.com" target="_blank"><img src="url('storage/assets/Youtube.svg') }}" width="25" height="25" alt=""/></a> --}}
              </div>
            </div>

            <!-- links -->
            {{-- <div class="flex flex-col gap-[16px] w-[100px]">
              <a href="./index.html" class="[font-family:'Open_Sans',sans-serif] text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer">الرئيسية</a>
              <a
                href="./product.html"
                class="[font-family:'Open_Sans',sans-serif] text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer"
              >
                المنتجات
              </a>
              <a
                href="./about-us.html"
                class="[font-family:'Open_Sans',sans-serif] text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer"
              >
                من نحن
              </a>
              <a
                href="./contactus.html"
                class="[font-family:'Open_Sans',sans-serif] text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer"
              >
                تواصل معنا
              </a>
              <a
                href="./blog.html"
                class="[font-family:'Open_Sans',sans-serif] text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer"
              >
                المدونة
              </a>
            </div> --}}
            <div class="flex flex-col gap-[16px] w-[100px]">
                @foreach ($navbarLinks as $navbarLink)
                @if (in_array($navbarLink->controller_name, ['HomePageController', 'ServicePageController','AboutPageController','ContactPageController']))
                    <a href="{{ route('dynamic.page', ['lang' => app()->getLocale() == 'en' ? '' : app()->getLocale(), 'slug' => $navbarLink->slug]) }}"
                       class="nav-link capitalize {{ session('active_navbar_link') === $navbarLink->slug ? 'active-link text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer' : ' text-[18px] text-base font-normal leading-4 text-[#FBFCF8] cursor-pointer' }}">
                        {{ $navbarLink->title }}
                    </a>
                @endif
              @endforeach
            </div>
          </div>
          <div  class="text-center mt-6 border-t pt-[32px] flex items-center justify-between flex-wrap-reverse border-[#FBFCF8]">
            @if (app()->getLocale() == 'en')
            <p class="text-[#FBFCF8] text-[14px]">
            <bdi>© 2025 mkani . All rights reserved</bdi>
            </p>
            @else
            <p class="text-[#FBFCF8] text-[14px]">
                <bdi>© 2025 mkani . جميع الحقوق محفوظة</bdi>
              </p>
            @endif

            <div class="links flex flex-col gap-[24px] md:flex-row">
              <a href="" class="text-white">سياسة الخصوصية</a>
              <a href="" class="text-white">شروط الخدمة</a>
              <a href="" class="text-white">إعدادات الكوكيز</a>
            </div>
          </div>
        </div>
      </section>
      {{-- <script>
        document.querySelector('.Subscribe').addEventListener('submit', async (event) => {
       event.preventDefault(); // Prevent form default submission
       console.log('Form submitted');

       const email = document.getElementById('email').value;

       if (!email) {
         displayPopup('Please enter a valid email address.', false);
         return;
       }

       // Show overlay with loading spinner
       showLoadingOverlay();

       try {
         const response = await fetch('{{ url('/') }}/api/v1/subscribers/create', {
           method: 'POST',
           headers: {
             'Content-Type': 'application/json',
           },
           body: JSON.stringify({
             email: email,
             isSubscribed: 1,
           }),
         });

         if (response.ok) {
           const result = await response.json();
           displayPopup('Subscription successful. Thank you for subscribing!', true);
           document.getElementById('email').value = ''; // Clear the input field
         } else {
           if (response.status === 401) {
             displayPopup('You are already subscribed.', false);
           } else {
             displayPopup('Failed to subscribe. Please try again later.', false);
           }
         }
       } catch (error) {
         console.error('Error:', error);
         displayPopup('An error occurred. Please try again later.', false);
       } finally {
         // Hide the overlay after the response or error
         hideLoadingOverlay();
       }
     });

     function displayPopup(message, isSuccess) {
       const popup = document.createElement('div');
       popup.className = 'custom-popup';
       popup.style.position = 'fixed';
       popup.style.top = '50%';
       popup.style.left = '50%';
       popup.style.transform = 'translate(-50%, -50%)';
       popup.style.padding = '20px';
       popup.style.backgroundColor = isSuccess ? '#4CAF50' : '#f44336';
       popup.style.color = 'white';
       popup.style.borderRadius = '8px';
       popup.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
       popup.style.zIndex = 10000;
       popup.innerHTML = `
         <p style="margin: 0;">${message}</p>
         <button style="margin-top: 10px; padding: 8px 12px; border: none; background: white; color: ${isSuccess ? '#4CAF50' : '#f44336'}; border-radius: 4px; cursor: pointer;">
           OK
         </button>
       `;
       document.body.appendChild(popup);

       const closeButton = popup.querySelector('button');
       closeButton.addEventListener('click', () => {
         popup.remove();
       });
     }

     function showLoadingOverlay() {
       const overlay = document.createElement('div');
       overlay.id = 'loading-overlay';
       overlay.style.position = 'fixed';
       overlay.style.top = 0;
       overlay.style.left = 0;
       overlay.style.width = '100vw';
       overlay.style.height = '100vh';
       overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
       overlay.style.display = 'flex';
       overlay.style.justifyContent = 'center';
       overlay.style.alignItems = 'center';
       overlay.style.zIndex = 9999;

       overlay.innerHTML = `
         <div style="border: 4px solid #f3f3f3; border-top: 4px solid #3498db; border-radius: 50%; width: 50px; height: 50px; animation: spin 1s linear infinite;"></div>
         <style>
           @keyframes spin {
             0% { transform: rotate(0deg); }
             100% { transform: rotate(360deg); }
           }
         </style>
       `;

       document.body.appendChild(overlay);
     }

     function hideLoadingOverlay() {
       const overlay = document.getElementById('loading-overlay');
       if (overlay) {
         overlay.remove();
       }
     }
    </script> --}}
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      @vite(['resources/js/app.js'])

    </body>
</html>
