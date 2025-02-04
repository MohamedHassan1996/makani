@include('Layout.header')
<!-- hero section -->
<section>
    @php
        $data = $homePage->sections;
        $heroSection = $data->first();
        $heroSectionImages = $heroSection->images;

        $aboutUsSection = $data->skip(1)->first();
        $aboutUsSectionImages = $aboutUsSection->images;

        $productsSection = $data->skip(2)->first();

        $whyUsSection = $data->skip(4)->first();
        $whyUsSectionImages = $whyUsSection->images;
        // $feedbacksection = $data->skip(5)->first();

    @endphp
@include('Layout.navbar')
<!-- hero section -->
<section class="heroSection">
<div class="heroSectionHomePage font-[Ping_AR_+_LT]" style="background-image: url('storage/assets/bgMkany.png'); background-size: cover; background-position: center; width: 100%; height: 100%;">
    <div class="flex justify-start items-center flex-col w-11/12 md:w-4/5 m-auto pt-[100px] pb-[41px]">
        <div class="flex flex-col md:flex-row justify-between gap-[20px] md:gap-[40px]">
        <div class="flex-1">
            <div class="[font-family:Ping_AR_+_LT]">
            <!-- <h1 class="text-[28px] md:text-[80px] font-bold  leading-[36px] md:leading-[106px] text-[#2b2b2b]">hello hassan</h1> -->
            <h1 class="text-[28px] md:text-[80px] font-bold  leading-[36px] md:leading-[106px] text-[#2b2b2b]">{{ $heroSection->content[0]['title'] }}</h1>
            <p class="md:text-2xl font-normal  leading-[20px] md:leading-[29px] text-[#8e8e8e] mt-2">{{  $heroSection->content[0]['content'] }}</p>
            </div>
            <a href="{{app()->getLocale() == 'en' ? url('services') : url('ar/الخدمات ')  }}" class="bg-[#2c64e3] w-fit h-10 md:text-base font-medium leading-[19px] text-[white] md:h-12 px-4 md:px-5 flex items-center justify-center gap-[5px] md:gap-[7px] mt-6 md:mt-8 rounded-lg">
            <!-- <span>وظّف عمالة</span> -->
            <span>
                {{ $heroSection->content[0]['btn'] }}
            </span>
            <div class="w-5 md:w-6 h-5 md:h-6 flex">
                <img src="{{ url('storage/assets/users.svg') }}" alt="">
            </div>
            </a>
        </div>
        <img src="{{ url('storage/'.$heroSectionImages[0]['path']) }}" class="h-[300px] md:h-[450px] object-cover w-full md:w-[450px] block rounded-xl border-[none]" />
        </div>
        <div class="flex justify-start items-center flex-col mt-[111px] pr-[5px]">
        <div class="flex justify-start items-stretch flex-col w-[134px] ">
            <p class="[font-family:Ping_AR_+_LT] text-xl font-medium text-center leading-6 text-[#2c64e3]">تصفح للمزيد</p>
            <div class="self-center mt-[6.5px]">
            <img src="{{ url('storage/assets/image_8c5d3a11.png') }}" class="h-[35px] max-w-[initial] w-[22.5px] block " />
            </div>
        </div>
        </div>
    </div>
    </div>
</section>


</section>
 @include('Home.Sections.aboutUs', [
    'aboutUsSection' => $aboutUsSection,
    'aboutUsSectionImages' => $aboutUsSectionImages,
])

@include('Home.Sections.ServiceCategory', [
    'productsSection' => $productsSection,
    'products' => $productCategory,
])
@include('Home.Sections.Services', [
    // 'blogSection' => $blogSection,
    'products' => $products
])

@include('Home.Sections.whyUs', [
    'whyUsSection' => $whyUsSection,
    'whyUsSectionImages' => $whyUsSectionImages,
])

@include('Home.Sections.feedback', [
])


@include('Layout.footer')
