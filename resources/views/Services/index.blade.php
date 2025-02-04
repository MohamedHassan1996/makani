@include('Layout.header')
 @include('Layout.navbar')
<!-- services -->
<section>
    <div class="bg-[white]">
      <div class="flex justify-center w-11/12 md:w-4/5 m-auto flex-col py-24">
        <p class="[font-family:Ping_AR_+_LT] text-3xl md:text-7xl font-bold leading-[40px] md:leading-[86px] text-[#333333]">{{ app()->getLocale() == 'en' ? "What we offer you."  : "ما نقدمة إليك" }} </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
            @foreach ($productCategories as $product)
            <div class="bg-[#fbfcf8] flex justify-start items-stretch flex-col max-w-[389px] grow shrink rounded-xl border-[3px] border-solid border-[#fbfcf8]">
                <img src="{{ url('storage/'. $product->image) }}" class="h-44 max-w-[initial] object-cover  block border-[none]" />
                <div class=" flex justify-start flex-col pt-6 pb-[25.5px] px-[23px]">
                  <h2 class="[font-family:Ping_AR_+_LT] text-[29px] font-bold leading-[35px] text-[#333333]">{{ $product->name }}</h2>
                  <p class="[font-family:Ping_AR_+_LT] text-2xl font-normal  leading-[29px] text-[#8e8e8e] self-stretch mt-4">{{ $product->description }}</p>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
    </section>
    @include('Layout.footer')
