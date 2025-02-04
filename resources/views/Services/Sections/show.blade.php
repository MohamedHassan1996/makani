@include('Layout.header')
@include('Layout.navbar')

<div class="flex flex-col md:flex-row justify-start items-start w-11/12 md:w-4/5 m-auto  py-24">
    <img src="{{ url('storage/'.$product->images->first()->path) }}" class="h-auto max-w-full object-cover w-full md:w-[380px] mt-8 md:mt-0 md:ml-[31px] rounded-xl border-[none]" />
    <div class="">
      <div class="product-details">
        <h3 class="font-[Ping_AR_+_LT] text-4xl md:text-7xl font-bold leading-[86px] text-[#333333] mb-2">{{ $product->name }}</h3>
        <p class="font-[Ping_AR_+_LT] text-base md:text-[29px] font-normal  leading-[25px] md:leading-[35px] mb-5 text-[#8e8e8e]">{{ $product->content }}</p>
        <div class="flex flex-col gap-4 mt-[2.75px] mr-6">
          <div class="flex">
            <div class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#333333]">
              <ul class="list-disc">
                <li>{{ app()->getLocale() == 'en' ? 'age:' : " :السن"  }}</li>
              </ul>
            </div>
            <p class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#8e8e8e]">{{ $product->slug }}</p>
          </div>

          <div class="flex">
            <div class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#333333]">
              <ul class="list-disc">
                <li>{{ app()->getLocale() == 'en' ? 'job:' : " :الوظيفة"  }}</li>
              </ul>
            </div>
            <p class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#8e8e8e]">{{  $product->description }}</p>
          </div>
                @foreach ($product->meta_data as $data)
                <div class="flex">
                    <div class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#333333]">
                      <ul class="list-disc">
                        <li></li>
                      </ul>
                    </div>
                    <p class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#8e8e8e]">{{ $data }}</p>
                  </div>
                @endforeach



          {{-- <div class="flex">
            <div class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#333333]">
              <ul class="list-disc">
                <li>السن :</li>
              </ul>
            </div>
            <p class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#8e8e8e]">32</p>
          </div>

          <div class="flex">
            <div class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#333333]">
              <ul class="list-disc">
                <li>لغه التحدث :</li>
              </ul>
            </div>
            <p class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#8e8e8e]">العربيه والعبريه</p>
          </div>

          <div class="flex">
            <div class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#333333]">
              <ul class="list-disc">
                <li>سنين الخبره :</li>
              </ul>
            </div>
            <p class="font-[Ping_AR_+_LT] text-lg md:text-2xl font-medium leading-[29px] text-[#8e8e8e]">15</p>
          </div> --}}

        </div>
      </div>
      <!-- Button Component is detected here -->
      <button class="bg-[#2c64e3] [font-family:Ping_AR_+_LT] text-base font-medium leading-[19px] text-[white] cursor-pointer px-10 h-12 inline-flex items-center justify-center gap-[3px]  mt-10 rounded-lg border-[none]">
        <div class="w-6 h-6 flex">
          <svg viewBox="0 0 24 24" x="0" y="0" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="&lt;Icon> Before_2" data-node-id="I9071:2418;89:1331" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector_17" data-node-id="I9071:2418;89:1331;7005:7842" d="M8.625,12c0,0.207 -0.168,0.375 -0.375,0.375c-0.207,0 -0.375,-0.168 -0.375,-0.375c0,-0.207 0.168,-0.375 0.375,-0.375c0.207,0 0.375,0.168 0.375,0.375zM8.625,12h-0.375M12.375,12c0,0.207 -0.168,0.375 -0.375,0.375c-0.207,0 -0.375,-0.168 -0.375,-0.375c0,-0.207 0.168,-0.375 0.375,-0.375c0.207,0 0.375,0.168 0.375,0.375zM12.375,12h-0.375M16.125,12c0,0.207 -0.168,0.375 -0.375,0.375c-0.207,0 -0.375,-0.168 -0.375,-0.375c0,-0.207 0.168,-0.375 0.375,-0.375c0.207,0 0.375,0.168 0.375,0.375zM16.125,12h-0.375M21,12c0,4.556 -4.029,8.25 -9,8.25c-0.887,0 -1.745,-0.118 -2.555,-0.337c-0.975,0.685 -2.163,1.087 -3.445,1.087c-0.199,0 -0.396,-0.01 -0.59,-0.029c-0.16,-0.015 -0.318,-0.037 -0.474,-0.065c0.483,-0.571 0.827,-1.263 0.978,-2.025c0.091,-0.457 -0.133,-0.901 -0.467,-1.226c-1.517,-1.477 -2.447,-3.466 -2.447,-5.655c0,-4.556 4.029,-8.25 9,-8.25c4.971,0 9,3.694 9,8.25z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </svg>
        </div>
        توظيف
      </button>
    </div>
  </div>
  @include('Layout.footer')
