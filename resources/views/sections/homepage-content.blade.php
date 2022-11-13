<div class="container w-full main-content">
  {{-- First Block --}}
  <div class="flex py-[83px] first-block">
    <div class="w-1/4 mt-3.5">
      <h2 class="text-[#40AE49] font-light text-2xl">{{ _e('Advanced Fingerprinting and Biometrics', 'printscan') }}</h2>
      <span class="border-b border-[#2C58BD] block w-1/2 h-[70px]"></span>
    </div>
    <div class="w-3/4">
      <p class="text-[#091F40] font-light text-[52px] leading-[75px] mb-14">{{ _e('PrintScan is the leader in fingerprinting and biometric innovation with services around the world and convenient locations across the United States.', 'printscan') }}
      </p>
      <a class="uppercase text-white bg-[#40AE49] hover:bg-green-700 transition-all font-normal rounded-[25px] py-3 px-4" href="#">{{ _e('Schedule Appointment', 'printscan') }}</a>
    </div>
  </div>

  {{-- Second Block --}}
  <div class="second-block">
    <div class="second-block__content container py-[135px] lg:px-[4.5rem]">
      <div class="titles mb-14">
        <h2 class="text-[53px] font-light text-white">{{ _e('Secure Identity', 'printscan') }}</h2>
        <h2 class="text-[53px] font-light text-white">{{ _e('Services and Solutions', 'printscan') }}</h2>
      </div>
      @foreach ($printscan_services_tabs as $serviceTab)
        <div class="second-block__box">
          <div class="flex w-full {{ $loop->even ? 'flex-row-reverse' : '' }}">
            <img class="h-[460px] rounded-xl" src="{{ $serviceTab['service_image'] }}" alt="">
            <div class="flex flex-col justify-center text-white {{ $loop->even ? 'mr-[110px]' : 'ml-[110px]' }}">
              <h3 class="text-4xl font-normal">{{ $serviceTab['title'] }}</h3>
              <p class="font-light text-[18px] w-[55%]">{{ $serviceTab['subtitle'] }}</p>
              <a class="uppercase text-white text-center w-1/3 mt-8 bg-transparent hover:bg-[#4277F0] border-white border transition-all font-normal rounded-[25px] py-3 px-4 second-block__button" href="{{ $serviceTab['link'] }}">Learn More</a>
            </div>
          </div>
        </div>
      @endforeach
      <div class="fingerprinting-near-me text-white xl:mt-48 w-1/2 z-10">
        <h2 class="text-[53px] font-light leading-[65px] mb-8">{{ _e('Fingerprinting Near Me', 'printscan') }}</h2>
        <p class="text-lg font-light">
          {{ _e('Whether you visit one of our many locations or schedule a technician to come to your business or location, PrintScan makes it easy for you to get your fingerprinting and background checks completed and submitted.', 'printscan') }}
        </p>
      </div>
    </div>
  </div>

  {{-- Fingerprinting Near Me - Section --}}
  <div class="w-full near-me-section">
    <div class="near-me-section__content flex xl:gap-6">
      <div class="w-3/5 map-search-section flex flex-col">
        <div class="search-section z-10 border-[0.5px] bg-white rounded-[15px] border-[#2C58BD] px-9 py-8">
          <div class="texts flex text-[#54555B] font-medium text-lg pl-2 mb-2">
            <p class="grow">Where</p>
            <p class="relative left-[-160px]">Search Radius</p>
          </div>
          <div class="search flex">
            <div class="grow flex relative">
              <input class="outline-none grow border-[5px] border-[#6E94EC] rounded-[25px] px-4 placeholder:font-light placeholder:text-[#54555B] py-1.5" type="text" name="location" id="location" placeholder="Enter Your Location">
              <select class="px-4 py-1.5 text-[#54555B] rounded-[25px] w-[156px] right-0 top-[1px] absolute cursor-pointer border-[5px] border-[#6E94EC] font-light outline-none appearance-none" name="miles" id="miles">
                <option value="5">5 Miles</option>
                <option value="10">10 Miles</option>
                <option value="15">15 Miles</option>
                <option value="20">20 Miles</option>
                <option value="25">25 Miles</option>
                <option value="30">30 Miles</option>
                <option value="35">35 Miles</option>
                <option value="40">40 Miles</option>
                <option value="45">45 Miles</option>
                <option value="50" selected>50 Miles</option>
              </select>
            </div>
            <button type="button" class="near-search-button bg-[#40AE49] py-3 px-6 ml-4 uppercase text-base font-normal rounded-[25px] text-white transition-all hover:bg-[#40ae49de]">Search</button>
          </div>
        </div>
        <div class="map-section z-10 mt-6">
          <iframe class="rounded-[15px]" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24174.2840317632!2d-74.0478384!3d40.7667422!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25782f1042d95%3A0xba005c0f7421780!2sUnion%20City%2C%20NJ%2007087%2C%20USA!5e0!3m2!1sen!2sar!4v1668355405177!5m2!1sen!2sar" width="100%" height="430" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <div class="w-2/5 locations-section z-10 bg-white pl-9 pr-5 pt-8 pb-6 rounded-[15px]">
        text
      </div>
    </div>
  </div>
</div>