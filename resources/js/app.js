import './bootstrap';
// import Swiper from 'swiper/bundle';
// import 'swiper/css/bundle';
// window.Swiper = Swiper;
document.addEventListener("DOMContentLoaded", () => {
    const header = document.getElementById("header");
    const handleScroll = () => {
      if (window.scrollY > 100) {
        header.classList.add("pinned");
      } else {
        header.classList.remove("pinned");
      }
    };
    window.addEventListener("scroll", handleScroll);


    const swiper = new Swiper(".swiper", {
      direction: "horizontal",
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".arrow-next",
        prevEl: ".arrow-prev",
      },
    });


    const navLinks = document.querySelector(".nav-links")
    const btnToggleSide = document.querySelector(".btn-sidebarToggle");
    btnToggleSide.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });

    document.querySelector(".close-side-bar").addEventListener("click", (e) => {
      navLinks.classList.remove("active");
    })


    const customSelect = document.querySelector(".custom-select");
    const selectedOption = customSelect.querySelector(".selected-option");
    const options = customSelect.querySelector(".options");
    console.log(options);

    // Get the saved language from localStorage
    const savedLang = localStorage.getItem("selectedLanguage") || "en";
    updateSelectedLanguage(savedLang);

    customSelect.addEventListener("click", () => {
      customSelect.classList.toggle("open");
    });

    options.addEventListener("click", (event) => {
        console.log(event.target);
      if (event.target.tagName === "LI" || event.target.closest("li")) {
        const li = event.target.tagName === "LI" ? event.target : event.target.closest("li");
        const value = li.getAttribute("data-value");
        const img = li.querySelector("img").src;
        const text = li.textContent.trim();

        // Update selected option
        selectedOption.innerHTML = `<img src="${img}" alt="${text} Flag" class="flag-icon" /> ${text}`;
        customSelect.classList.remove("open");

        // Save selected language to localStorage
        localStorage.setItem("selectedLanguage", value);

        // Update active class
        updateActiveOption(value);
      }
    });

    document.addEventListener("click", (event) => {
      !customSelect.contains(event.target) ? customSelect.classList.remove("open") : null;
    });

    document.querySelectorAll('.language-picker').forEach((element) => {
      element.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default anchor behavior

        const lang = element.getAttribute("data-lang");
        const currentUrl = new URL(window.location.href); // Get the current URL
        const pathname = currentUrl.pathname;
        const queryParams = currentUrl.search; // Preserve query parameters if any
        const segments = pathname.split("/").filter(segment => segment !== ""); // Split URL into segments

        // Determine if the first segment is a language code
        const supportedLangs = ["ar", "en", "fr", "es"];
        let currentLang = supportedLangs.includes(segments[0]) ? segments.shift() : "en";

        // Replace the language segment or add it as the first segment
        if (lang !== currentLang) {
          const newPath = lang === "en" ? `/${segments.join("/")}` : `/${lang}/${segments.join("/")}`;
          const newUrl = `${currentUrl.origin}${newPath}${queryParams}`;
          window.location.href = newUrl;
        }

        // Update HTML attributes for direction and language
        const htmlElement = document.documentElement;
        const body = document.body;
        if (lang === "en") {
          body.classList.remove("rtl");
          htmlElement.setAttribute("dir", "ltr");
          htmlElement.setAttribute("lang", "en");
        } else {
          body.classList.add("rtl");
          htmlElement.setAttribute("dir", "rtl");
          htmlElement.setAttribute("lang", lang);
        }
      });
    });

    // Function to update active language option
    function updateActiveOption(lang) {
      options.querySelectorAll("li").forEach((li) => {
        li.classList.toggle("active", li.getAttribute("data-value") === lang);
      });
    }

    // Function to update the selected language in UI
    function updateSelectedLanguage(lang) {
      const activeOption = options.querySelector(`li[data-value="${lang}"]`);
      if (activeOption) {
        const img = activeOption.querySelector("img").src;
        const text = activeOption.textContent.trim();
        selectedOption.innerHTML = `<img src="${img}" alt="${text} Flag" class="flag-icon" /> ${text}`;
        updateActiveOption(lang);
      }
    }


    const swiper_testmoniols = new Swiper(".swiper-testmoniols", {
        direction: "horizontal",
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".arrow-next",
          prevEl: ".arrow-prev",
        },
    });

});
