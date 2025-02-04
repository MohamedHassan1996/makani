@include('Layout.header')
@include('Layout.navbar')
<main class="flex justify-between w-11/12 md:w-[90%] m-auto items-stretch flex-col box-border pt-24 pb-[169px]" >
    <h2 class="font-[Ping_AR_+_LT] text-3xl md:text-7xl font-bold leading-[40px] md:leading-[86px] text-[#333333]">
        {{ app()->getLocale() == 'en' ? 'Contact us for your needs.' : ' اتصل بنا لتلبية احتياجاتك.'}}
    </h2>
    @if (session('created'))
        <div class="alert alert-success">
            {{ session('created') }}
        </div>
    @endif
<div class="contact-us-page flex justify-between flex-row gap-2 mt-20">
    <form id="contactForm" class="flex  justify-start items-stretch flex-col gap-[31px] w-full md:w-[553px] box-border">
        <div class="flex justify-start items-center flex-col sm:flex-row  gap-3">
            <div class="w-full flex justify-center items-stretch flex-col grow shrink basis-0">
                {{ app()->getLocale() == 'en' ? 'name' : 'الاسم' }}
            <label for="name" class="font-[Ping_AR_+_LT] text-lg font-medium leading-[21.5px] text-[#333333]">
            </label>
            <input type="text" id="name" name="name" class="rounded border bg-[#fbfcf8] box-border flex justify-center items-end flex-col h-[50px] mt-[15px] px-6 border-solid border-[#8e8e8e] font-[Ping_AR_+_LT] text-base font-normal leading-[19px] text-[#8e8e8e] " required />
            </div>

            <div class="flex justify-center items-stretch flex-col grow shrink basis-0 w-full">
            <label
            for="phone"
            class="font-[Ping_AR_+_LT] text-lg font-medium leading-[21.5px] text-[#333333]"
            >
            {{ app()->getLocale() == 'en' ? 'phone' : ' رقم الهاتف' }}
            </label>
            <input
            type="tel"
            id="mobile-phone"
            name="phone"
            class="rounded border bg-[#fbfcf8] box-border flex justify-center items-end flex-col h-[50px] mt-[15px] px-6 border-solid border-[#8e8e8e] font-[Ping_AR_+_LT] text-base font-normal leading-[19px] text-[#8e8e8e]"
            />
            </div>
        </div>

        <div class="flex justify-start items-stretch flex-col">
        <label for="email" class="font-[Ping_AR_+_LT] text-lg font-medium leading-[21.5px] text-[#333333]">
            {{ app()->getLocale() == 'en' ? 'Email' : 'البريد الإلكتروني' }}
        </label>
        <input type="email" id="email" name="email" class="rounded border bg-[#fbfcf8] box-border flex justify-center items-end flex-col h-[50px] mt-[15px] px-6 border-solid border-[#8e8e8e] font-[Ping_AR_+_LT] text-base font-normal leading-[19px] text-[#8e8e8e]" />
        </div>

        <div class="flex justify-start items-stretch flex-col">
        <label
        for="subject"
        class="font-[Ping_AR_+_LT] text-lg font-medium leading-[21.5px] text-[#333333]"
        >
        {{ app()->getLocale() == 'en' ? 'Subject' : 'الموضوع' }}
        </label>
        <input
        type="text"
        id="subject"
        name="subject"
        class="rounded border bg-[#fbfcf8] box-border flex justify-center items-end flex-col h-[50px] mt-[15px] px-6 border-solid border-[#8e8e8e] font-[Ping_AR_+_LT] text-base font-normal leading-[19px] text-[#8e8e8e]"
        />
        </div>
        <div class="flex justify-start items-stretch flex-col">
        <div class="flex justify-start items-stretch flex-col">
        <label for="message" class="font-[Ping_AR_+_LT] text-lg font-medium leading-[21.5px] text-[#333333]">
            {{ app()->getLocale() == 'en' ? 'Message' : 'الرسالة' }}
        </label>
        <textarea
        id="message"
        name="message"
        class="rounded h-[200px] border bg-[#fbfcf8] box-border flex justify-start items-end flex-col mt-[15px] pt-[13px] pb-0.5 px-[2.25px] border-solid border-[#333333] font-[Ping_AR_+_LT] leading-[19px] text-[#8e8e8e] px-[9.5px]"
        rows="4"
        ></textarea>
        </div>
        <button
        type="submit"
        class="bg-[#2c64e3] font-[Ping_AR_+_LT] text-base font-medium leading-[19px] text-white cursor-pointer h-12 block box-border mt-[23px] rounded-lg border-none"
        >
        {{ app()->getLocale() == 'en' ? 'Send' : 'إرسال' }}
        </button>
        </div>
    </form>
        <!-- Success and Error Popups -->
    <div id="popup" style="display: none; position: fixed; top: 20%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: white; padding: 20px; border: 1px solid #333; border-radius: 5px; text-align: center;">
        <p id="popupMessage"></p>
        <button onclick="document.getElementById('popup').style.display = 'none'">Close</button>
    </div>
    <div id="loading" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
        <p>Loading...</p>
    </div>
    @include('Contact.Sections.contactMap')
</div>
  </main>
  <script>
    document.querySelector('#contactForm').addEventListener('submit', async (event) => {
       event.preventDefault();
        console.log("done")
   // Get values directly by name
   console.log(document.getElementById('name').value);
   console.log(document.getElementById('email').value);
   console.log(document.getElementById('mobile-phone').value);
   console.log(document.getElementById('subject').value);
   console.log(document.getElementById('message').value);



   const name = document.getElementById('name').value;
   const email = document.getElementById('email').value;
   const phone = document.getElementById('mobile-phone').value;
   const subject = document.getElementById('subject').value;
   const message = document.getElementById('message').value;
   // Create a data object
   const data = {
       name: name,
       email: email,
       phone: phone,
       subject: subject,
       message: message,
   };

       const popup = document.getElementById('popup');
       const popupMessage = document.getElementById('popupMessage');
       const loading = document.getElementById('loading');

       try {
         loading.style.display = 'block';

         const response = await fetch('http://127.0.0.1:8000/api/v1/contact-us/create', {
           method: 'POST',
           headers: {
             'Content-Type': 'application/json'
           },
           body: JSON.stringify(data)
         });

         loading.style.display = 'none';

         if (response.ok) {
           const result = await response.json();
           popupMessage.textContent = 'Message sent successfully!';
           popup.style.display = 'block';
           event.target.reset();
         } else {
           const error = await response.json();
           popupMessage.textContent = `Error: ${error.message || 'Something went wrong'}`;
           popup.style.display = 'block';
         }
       } catch (error) {
         loading.style.display = 'none';
         console.error('Fetch Error:', error);
         popupMessage.textContent = 'An error occurred while sending your message. Please try again.';
         popup.style.display = 'block';
       }
     });

</script>
@include('Layout.footer')
