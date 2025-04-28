<!-- status -->
<div class="bg-[rgba(51,51,51,0.04)]">
    <div class="flex flex-wrap justify-between items-center w-11/12 md:w-4/5 m-auto py-12">
        
        <div class="flex justify-center items-stretch flex-col w-full md:w-auto mb-6 md:mb-0 text-center">
            <p class="[font-family:Ping_AR_+_LT] text-[40px] md:text-[50px] font-bold leading-[50px] md:leading-[60px] text-[#2c64e3]" data-target="{{ $customercount }}">0</p>
            <p class="[font-family:Ping_AR_+_LT] text-lg md:text-xl font-normal text-center leading-5 md:leading-6 text-[#777777] mt-2 mx-3.5">عميل سعيد</p>
        </div>

        <div class="flex justify-center items-stretch flex-col w-full md:w-[106px] box-border mb-6 md:mb-0 text-center">
            <p class="[font-family:Ping_AR_+_LT] text-[40px] md:text-[50px] font-bold leading-[50px] md:leading-[60px] text-[#2c64e3]" data-target="{{ $productCategoryCount }}">0</p>
            <p class="[font-family:Ping_AR_+_LT] text-lg md:text-xl font-normal text-center leading-5 md:leading-6 text-[#777777] mt-2">خدمتنا</p>
        </div>

        <div class="flex justify-center items-center flex-col w-full md:w-auto mb-6 md:mb-0 text-center">
            <p class="[font-family:Ping_AR_+_LT] text-[40px] md:text-[50px] font-bold leading-[50px] md:leading-[60px] text-[#2c64e3]" data-target="{{ $productcount }}">0</p>
            <p class="[font-family:Ping_AR_+_LT] text-lg md:text-xl font-normal leading-5 md:leading-6 text-[#777777] mt-2">عامل &amp; عاملة</p>
        </div>

    </div>
</div>

<!-- countUp on Scroll Script -->
<script>
const CountersOnScroll = () => {
    const counters = document.querySelectorAll("p[data-target]");

    const startedCounters = new Set();

    const updateCounters = () => {
        counters.forEach(counter => {
            const sectionTop = counter.getBoundingClientRect().top;
            const scrollThreshold = window.innerHeight * 0.6;

            if (sectionTop < scrollThreshold && !startedCounters.has(counter)) {
                startedCounters.add(counter);

                const target = parseInt(counter.getAttribute("data-target"), 10);
                let count = 0;
                const totalDuration = 2000; // 2 seconds total
                const increment = target / (totalDuration / 16); // Assuming ~60fps

                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        if (count > target) count = target;
                        counter.textContent = Math.floor(count);
                        requestAnimationFrame(updateCounter);
                    }
                };

                updateCounter();
            }
        });
    };

    window.addEventListener("scroll", updateCounters);
    // Run once on load in case already visible
    updateCounters();
};

// Initialize
CountersOnScroll();
</script>
