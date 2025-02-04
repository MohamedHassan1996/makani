<section class="aboutUs">
    <div class="bg-[#2C64E3] relative">
        <img src="{{ url('storage/assets/aboutus.png') }}" alt="About Us Background" class="absolute opacity-5 inset-0 w-full h-full object-cover">
        <div class="about-us-section  w-11/12 md:w-4/5 m-auto flex flex-row justify-between items-center gap-6 py-12 md:py-24 relative z-10">
          <div class="flex flex-col max-w-full md:max-w-[497px] pt-6 md:pt-[30px]">
            <div class="">
              <p class="font-[Ping_AR_+_LT] text-3xl md:text-7xl font-bold  leading-[40px] md:leading-[86px] text-white">{{ $aboutUsSection->content[0]['title'] }}</p>
              <p class="font-[Ping_AR_+_LT] text-base md:text-xl font-normal  leading-5 md:leading-6 text-[#e8e8e8] my-2">{{ $aboutUsSection->content[0]['content'] }}</p>
            </div>
          </div>
          <div class="about-us-section-photos flex flex-row justify-center md:justify-start">
            <img src="{{ url('storage/'.$aboutUsSectionImages[1]['path']) }}" class="about-us-section-photoOne w-[200px] h-[200px] md:w-[270px] md:h-[270px] -ml-0 md:-ml-12 z-50 mt-6 md:mt-[100px]" />
            <img src="{{url('storage/'.$aboutUsSectionImages[0]['path'])}}" class="w-[240px] h-[250px] md:w-[320px] md:h-[330px]" />
          </div>
        </div>
      </div>
</section>
