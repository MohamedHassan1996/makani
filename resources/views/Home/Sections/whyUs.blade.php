<div class="bg-[white]">
  <div class="flex flex-col md:flex-row justify-start items-center gap-[30px] w-11/12 md:w-4/5 m-auto py-24">
    <div class="pt-[15.5px]">
      <h2 class="[font-family:Ping_AR_+_LT] text-4xl md:text-7xl font-bold  leading-[48px] md:leading-[86px] text-[#333333] max-w-full md:max-w-[497px]">{{ $whyUsSection->content[0]['title']}}</h2>
      <p class="[font-family:Ping_AR_+_LT] text-lg md:text-2xl font-normal  leading-[24px] md:leading-[29px] text-[#8e8e8e] self-stretch mt-2">{{  $whyUsSection->content[0]['content'] }}</p>
      <button onclick="window.location.href= '{{ app()->getLocale() == 'en' ? url('about-us') : url('ar/نبذة-عنا')  }}'" class="border bg-transparent [font-family:Ping_AR_+_LT] text-base font-medium leading-[19px] text-[#2c64e3] hover:bg-[#2c64e3] hover:text-white cursor-pointer min-w-[143px] h-[49px] w-[143px] inline-flex items-center justify-center gap-[3px] mt-[23.5px] rounded-lg border-solid border-[#2c64e3]">
        <span>{{  $whyUsSection->content[0]['btn'] }}</span>
        <div class="w-6 h-6 flex">
          <svg viewBox="0 0 24 24" x="0" y="0" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="&lt;Icon> Before_5" data-node-id="I9007:855;2027:16907" xmlns="http://www.w3.org/2000/svg">
              <g id="heroicons-outline/arrow-left_3" data-node-id="I9007:855;2027:16907;7005:6658">
                <path id="Vector_22" data-node-id="I9007:855;2027:16907;7005:6658;2:832" d="M10.5,19.5l-7.5,-7.5M3,12l7.5,-7.5M3,12h18" stroke="#2C64E3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </g>
            </g>
          </svg>
        </div>
      </button>
    </div>
    <img src="{{ url("storage/".$whyUsSectionImages[0]['path']) }}" class="h-auto max-w-full md:h-[429px] md:w-[600px] object-cover block rounded-lg border-[none]" />
  </div>
</div>
