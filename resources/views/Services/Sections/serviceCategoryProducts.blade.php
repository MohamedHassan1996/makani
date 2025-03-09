@include('Layout.header')
 @include('Layout.navbar')
<!-- services -->
<section>
    <main class="py-24 w-4/5 m-auto">
        <h1 class="[font-family:Ping_AR_+_LT] text-4xl md:text-7xl mb-[70px] font-bold leading-[50px] md:leading-[86px] text-[#333333]">{{ $productCategory->name }} </h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($products as $product)
            <div class="border bg-[white] box-border flex justify-start items-stretch flex-col gap-6 px-[23px] py-4 rounded-2xl border-solid border-[#e8e8e8]">
            <img class="h-[245px] max-w-[initial] object-cover box-border block  rounded-lg border-[none]" src="{{ url('storage/'. $product->images->first()->path) }}" />
            <h3 class="[font-family:Ping_AR_+_LT] text-[28px] md:text-[35px] font-bold leading-[34px] md:leading-[42px] text-[#333333] whitespace-pre-wrap "> {{ Str::limit($product->name,10) }}</h3>
            <div class="">
                <p class="[font-family:Ping_AR_+_LT] text-xl md:text-2xl font-medium leading-[24px] md:leading-[29px] text-[#333333] whitespace-pre-wrap">
                    {{ Str::limit($product->description,100) }}
                </p>
            </div>
            <button onclick="window.location.href='{{ url(app()->getLocale() == 'en' ? '/products/'.$product->slug : '/'.app()->getLocale().'/products/'.$product->slug) }}'" class="bg-[#2c64e3] [font-family:Ping_AR_+_LT] text-base font-medium leading-[19px] text-[white] cursor-pointer h-12 inline-flex items-center justify-center gap-[3px] box-border rounded-lg border-[none]">
              <div class="w-6 h-6 flex">
                <svg viewBox="0 0 24 24" x="0" y="0" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="&lt;Icon> Before_2" data-node-id="I9066:1764;9066:1001;89:1331" xmlns="http://www.w3.org/2000/svg">
                    <g id="heroicons-outline/arrow-left" data-node-id="I9066:1764;9066:1001;89:1331;7005:6658">
                      <path id="Vector_17" data-node-id="I9066:1764;9066:1001;89:1331;7005:6658;2:832" d="M10.5,19.5l-7.5,-7.5M3,12l7.5,-7.5M3,12h18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                  </g>
                </svg>
              </div>
              {{ app()->getLocale() == 'en' ? 'More details' : " تفاصيل اكثر"  }}
            </button>
        </div>
            @endforeach
        </div>
        </main>
    </section>
    @include('Layout.footer')
