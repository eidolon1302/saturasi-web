<style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .typing-container {
      overflow: hidden;
      border-right: .15em solid #000;
      white-space: nowrap;
    }
</style>

<div>
  <section class="container mx-auto p-4 mt-14 mb-8 ">
    <div class="h-9">
      <div class="text-4xl font-bold typing-container" id="typing-container">
    </div>   
  </section>
  <section class="container p-4 mx-auto">
    <div class="flex flex-wrap">
      <div class="mb-0 w-full shrink-0 grow-0 basis-auto lg:mb-0 md:mb-0 md:w-6/12">
        <h2 class="mb-6 text-3xl font-bold text-white">Give your stuff a longer life. </h2>
      </div>
      <div class="mb-4 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12">
        <p class="ext-slate-400 dark:text-neutral-300">
          Self taught programmer and UI/UX designer with a passion to learn new skills and technologies. I am currently an undergraduate student of Institut Teknologi Sepuluh Nopember anda a freelancer. I have been learning about interfaces, web development, and programming since 2023. I help businesses leave a lasting impression in the digital world. With a touch of creativity and empathy, I specialize in crafting modern websites that offer user-centric experiences .
        </p>
      </div>
    </div>
  </section>

  <hr class="my-6 sm:mx-auto border-slate-100 lg:my-8" />

  <section class="container p-4 mx-auto">
    <div class="flex flex-wrap">
      <div class="mb-10 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12">
        <h2 class="mb-6 text-3xl font-bold text-white">Contact us</h2>
        <p class="mb-6 text-slate-400 dark:text-neutral-300">
          Looking for more information or want to connect more with me, you can contact me here. Take it simple.
        </p>
        <p class="mb-2 text-slate-400">
          Sukolilo, 60117, Surabaya
        </p>
        <p class="mb-2 text-slate-400">
          +6289625546700
        </p>
        <p class="mb-2 text-slate-400">
          ricofitranda@gmail.com
        </p>
      </div>
      <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12 md:px-3 lg:px-6">
        <form form method="POST">
          @csrf
          <div class="relative mb-6" data-te-input-wrapper-init>
            <div>
              <x-label for="name">{{ __('Full Name') }} <span class="text-rose-500">*</span></x-label>
              <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Van Gogh" />
          </div>
          </div>
          <div class="relative mb-6" data-te-input-wrapper-init>
            <div>
              <x-label for="email">{{ __('Email Address') }} <span class="text-rose-500">*</span></x-label>
              <x-input id="email" type="email" name="email" :value="old('email')" required placeholder="cekidot@gmail.com" />
          </div>
          </div>
          <div class="relative mb-6" data-te-input-wrapper-init>
            <x-label for="email">{{ __('Message') }} <span class="text-rose-500">*</span></x-label>
            <textarea
              class="form-input w-full" rows="3" placeholder="Your message"></textarea>
          </div>
          <div class="mb-4 inline-block min-h-[1.5rem] justify-center pl-[1.5rem] md:flex">
            <input
              class="relative float-left mt-[0.15rem] mr-[6px] -ml-[1.5rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:ml-[0.25rem] checked:after:-mt-px checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-t-0 checked:after:border-l-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:ml-[0.25rem] checked:focus:after:-mt-px checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-t-0 checked:focus:after:border-l-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
              type="checkbox" value="" id="exampleCheck96" checked />
            <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="exampleCheck96">
              Send me a copy of this message
            </label>
          </div>
          <button class="btn w-full rounded bg-blue-700 hover:bg-indigo-900 text-xs font-medium uppercase text-black">
            Send
          </button>
        </form>
      </div>
    </div>
  </section>
  <hr class="my-6 sm:mx-auto border-slate-100 lg:my-8" />
</div>   

<script>
      // JavaScript for Typing Effect
      const texts = ["Hello, Envier!", "I am Rico Fitranda.", "Contact me if you need some stuff"];
      const typingContainer = document.getElementById("typing-container");
      let currentTextIndex = 0;
      let currentText = "";
      let isDeleting = false;
      let typingSpeed = 100; // Adjust the typing speed (milliseconds per character)
    
      function type() {
        const text = texts[currentTextIndex];
        if (isDeleting) {
          currentText = text.substring(0, currentText.length - 1);
        } else {
          currentText = text.substring(0, currentText.length + 1);
        }
    
        typingContainer.innerHTML = currentText;
    
        let typingDelay = isDeleting ? typingSpeed / 2 : typingSpeed;
    
        if (!isDeleting && currentText === text) {
          typingDelay = 1500; // Pause after typing
          isDeleting = true;
        } else if (isDeleting && currentText === "") {
          isDeleting = false;
          currentTextIndex++;
          if (currentTextIndex === texts.length) {
            currentTextIndex = 0;
          }
        }
    
        setTimeout(type, typingDelay);
      }
    
      document.addEventListener("DOMContentLoaded", function () {
        type();
      });
</script>