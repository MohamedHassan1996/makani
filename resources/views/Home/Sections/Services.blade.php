<div class="bg-[#FBFCF8]">
    <div class="flex justify-center flex-col py-24">
      <h1 class="[font-family:Ping_AR_+_LT] text-4xl md:text-7xl font-bold leading-[50px] md:leading-[86px] text-[#333333] w-11/12 md:w-4/5 m-auto">{{ app()->getLocale() =='en' ?"Choose the competency that suits your needs.": "اختَر الكفاءة التي تناسب احتياجاتك" }}</h1>
      <div class="flex justify-between items-center gap-[20px] w-[95%] m-auto">


      <!-- slider btn -->
      <div class="bg-[#2c64e3] hidden md:flex arrow-prev cursor-pointer justify-center items-center flex-col p-3 rounded-lg">
        <div class="w-6 h-6 flex">
          <img src="storage/assets/arrow_slider_right.svg" class="projects-arrow-icon-right" alt="">
        </div>
      </div>

      <div class="swiper w-[1000px] m-auto flex justify-between items-center flex-row gap-6 mt-14">
        <div class="swiper-wrapper">
        @foreach ($products as $product)
        <div class="swiper-slide border bg-[white] flex flex-col-reverse md:flex-row justify-center gap-6 md:gap-[50px] p-4 md:p-8 rounded-2xl border-solid border-[#e8e8e8]">
            <div class="product-details">
              <div class="flex justify-start items-stretch flex-col">
                <h3 class="[font-family:Ping_AR_+_LT] text-4xl md:text-6xl text-center font-bold leading-[50px] md:leading-[72px] text-[#333333]">{{  $product->name }}</h3>
                <div class="mt-4 md:mt-6">
                  <div class="flex flex-col md:flex-row justify-between items-center gap-2 first:mt-0 mt-4 md:mt-[24.00px]">
                    <div class="flex justify-start items-start flex-row">
                      <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap ml-1.5"> {{ app()->getLocale() == 'en' ? 'name:' : " الاسم:"  }}</p>
                      <p class="[font-family:Ping_AR_+_LT] text-xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap"> {{  $product->name }}</p>
                    </div>
                    <div class="flex justify-start items-start flex-row">
                      <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap ml-1.5">{{ app()->getLocale() == 'en' ? 'job:' : " الوظيفة:"  }}</p>
                      <p class="[font-family:Ping_AR_+_LT] text-xl  font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap">{{   $product->description }}</p>
                    </div>
                  </div>
                  <div class="flex flex-col md:flex-row justify-between items-center gap-2 mt-4 md:mt-[24.00px]">
                    <div class="flex justify-start items-start flex-row">
                      <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap ml-1.5"></p>
                      <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap"></p>
                    </div>
                    <div class="flex justify-start items-start flex-row">
                      <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap ml-1.5">{{ app()->getLocale() == 'en' ? 'age:' : " السن:"  }}</p>
                      <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap">{{ $product->slug }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <button class="bg-[#2c64e3] [font-family:Ping_AR_+_LT] text-base font-medium leading-[19px] text-[white] cursor-pointer w-full md:min-w-[362px] h-12 inline-flex items-center justify-center gap-[3px] mt-6 md:mt-[88px] rounded-lg border-[none]"
                onclick="window.location.href='{{ url(app()->getLocale() == 'en' ? '/products/'.$product->slug : '/'.app()->getLocale().'/products/'.$product->slug) }}'"
              >
                <span> {{ app()->getLocale() == 'en' ? 'More details' : " تفاصيل اكثر"  }}</span>
                <img src="storage/assets/arrow.svg" class="img-fluid w-6 h-6 flex rounded-top" alt="arrow" loading="lazy" />
              </button>
            </div>
            <img src="{{ url('storage/'.$product->images()->first()->path) }}" class="h-[200px] sm:h-[250px] sm:m-auto md:h-[314px] object-cover w-full sm:w-[400px] md:w-[500px] block rounded-lg mt-4 md:mt-0" />
          </div>
        @endforeach
        </div>
      </div>

      <!-- slider btn -->
      <div class="bg-[#2c64e3] arrow-next cursor-pointer hidden md:flex justify-center items-center flex-col p-3 rounded-lg">
        <div class="w-6 h-6 flex">
          <img src="storage/assets/arrow_slider_left.svg" class="projects-arrow-icon-left" alt="">
        </div>
      </div>

    </div>

    </div>
  </div>
