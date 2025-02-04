<div class="bg-[#FBFCF8] swiper-testmoniols overflow-hidden">
  <div class="swiper-wrapper">
    @foreach ($feedbacks as $feedback)
    <div class="swiper-slide flex justify-start items-stretch flex-col pt-24 pb-40 w-11/12 md:w-4/5 m-auto">
        <h2 class="[font-family:Ping_AR_+_LT] text-4xl md:text-7xl font-bold leading-[50px] md:leading-[86px] text-[#333333] text-center md:">بعض آراء عملائنا.</h2>
        <div class="flex justify-start items-start flex-col mt-8 md:mt-[88px]">
          <p class="[font-family:Ping_AR_+_LT] text-lg md:text-[35px] font-medium text-center leading-6 md:leading-[42px] text-[#777] w-full md:w-[60%] m-auto">{{ $feedback->name }}-{{ $feedback->feedback }}</p>
          <div class="self-center mt-4 md:mt-6">
            <img src="{{ url('storage/assets/image_e3440674.png') }}" class="h-6 md:h-8 max-w-full w-32 md:w-44 block" />
          </div>
        </div>
      </div>
    @endforeach
  </div>
  </div>


