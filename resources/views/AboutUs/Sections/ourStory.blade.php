 <!-- story -->
 <div class="flex flex-col-reverse md:flex-row justify-start items-start gap-6 md:gap-[30px] py-12 md:py-24 w-11/12 md:w-4/5 m-auto">
    <div class="flex justify-start flex-col grow-0 shrink basis-auto pb-1.5">
      <h1 class="[font-family:Ping_AR_+_LT] text-3xl md:text-7xl font-bold leading-[40px] md:leading-[86px] text-[#333333]">{{ $ourStorySection->content[0]['title'] }}</h1>
      <p class="[font-family:Ping_AR_+_LT] text-lg md:text-xl font-normal  leading-6 text-[#8e8e8e] self-stretch mt-4 md:mt-6">
      {{  $ourStorySection->content[0]['content']}}
      </p>
    </div>
    <img src="{{url('storage/'.$ourStorySectionImages[0]['path']) }}" class="h-auto max-w-full md:h-[429px] md:w-[495px] object-cover box-border block rounded-md border-[none]" />
  </div>
