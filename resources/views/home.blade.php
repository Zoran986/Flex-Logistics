
<x-layout title="Home - Traksi Ltd">

 <!-- Image Slider Hero Section - Replacing Video -->
    <section id="image-slider" class="relative h-[60vh] md:h-[80vh] overflow-hidden rounded-b-3xl shadow-2xl">
        
        <!-- Slides Container -->
        <div class="slides relative w-full h-full">
            
            <!-- Slide 1 -->
            <div class="slide absolute w-full h-full top-0 left-0 transition-opacity duration-700 opacity-0" data-index="0">
                   <img src="{{ asset('images/truck4.png') }}" 
                     alt="Traksi Modern Fleet" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-blue-900 bg-opacity-50 flex items-center justify-center">
                    <div class="text-center p-6 max-w-4xl">
                        <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter">
                            {{ __('messages.slider1_title')}}
                        </h1>
                        <p class="mt-4 text-xl md:text-2xl text-blue-200 font-light">
                           {{ __('messages.slider')}}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="slide absolute w-full h-full top-0 left-0 transition-opacity duration-700 opacity-0" data-index="1">
                  <img src="{{ asset('images/truck2.png') }}" 
                     alt="Traksi Modern Fleet" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gray-900 bg-opacity-40 flex items-center justify-center">
                    <div class="text-center p-6 max-w-4xl">
                        <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter">
                            {{ __('messages.slider2_title')}}
                        </h1>
                        <p class="mt-4 text-xl md:text-2xl text-blue-100 font-light">
                             {{ __('messages.slider2_text')}}
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide absolute w-full h-full top-0 left-0 transition-opacity duration-700 opacity-0" data-index="2">
                 <img src="{{ asset('images/truck3.png') }}" 
                     alt="Traksi Modern Fleet" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-blue-900 bg-opacity-50 flex items-center justify-center">
                    <div class="text-center p-6 max-w-4xl">
                        <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter">
                          {{ __('messages.slider3_title')}}
                        </h1>
                        <p class="mt-4 text-xl md:text-2xl text-blue-200 font-light">
                            {{ __('messages.slider3_text')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button onclick="changeSlide(-1)" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-80 transition z-20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button onclick="changeSlide(1)" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-80 transition z-20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Indicators (Dots) -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
            <div class="indicator w-3 h-3 bg-white rounded-full opacity-50 cursor-pointer" onclick="goToSlide(0)"></div>
            <div class="indicator w-3 h-3 bg-white rounded-full opacity-50 cursor-pointer" onclick="goToSlide(1)"></div>
            <div class="indicator w-3 h-3 bg-white rounded-full opacity-50 cursor-pointer" onclick="goToSlide(2)"></div>
        </div>

        <!-- Main CTA moved to the center of the slider -->
        <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2 z-20">
              <a href="" class="inline-block px-8 py-4 bg-blue-600 text-white font-semibold text-lg rounded-xl hover:bg-blue-700 transition duration-300 transform hover:scale-105 shadow-2xl focus:ring-4 focus:ring-blue-300">
                 {{ __('messages.get_quote')}}
            </a> 
        </div>
    </section>

    <!-- Main Content Sections Below the Slider -->
    <main class="py-16 bg-white">
        <div class="container mx-auto px-4">
            
            <!-- Section 1: Services Overview -->
            <section class="text-center mb-16">
                <h2 class="text-4xl font-bold text-blue-900 mb-4">{{ __('messages.what_we_offer_title')}}<h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    {{ __('messages.what_we_offer_text')}}
                </p>
                
                <div class="grid md:grid-cols-3 gap-8 mt-10">
                    <div class="p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-blue-500">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-2">{{ __('messages.service1_title') }}</h3>
                        <p class="text-gray-700">{{ __('messages.service1_text') }}</p>
                    </div>
                    <div class="p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-blue-500">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-2">{{ __('messages.service2_title') }}</h3>
                        <p class="text-gray-700">{{ __('messages.service2_text') }}</p>
                    </div>
                    <div class="p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-blue-500">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-2">{{ __('messages.service3_title') }}</h3>
                        <p class="text-gray-700">{{ __('messages.service3_text') }}</p>
                    </div>
                </div>
            </section>

            <!-- Stats Counter Section -->
        <div class="py-12 bg-blue-800 rounded text-white text-center">
            <div class="grid md:grid-cols-4 gap-8 px-8 ">
                 @php
                    // Note: These variables must be passed from the controller to the view
                 
                $carsCount = $cars->count();
                $driversCount = $cars->where('driver_id', true)->count();
                

                @endphp 
                
                <div>
                    <div class="text-5xl font-extrabold mb-1">{{ $driversCount }}</div>
                    <div class="text-lg font-light">{{ __('messages.drivers') }}</div>
                </div>
                <div>
                    <div class="text-5xl font-extrabold mb-1">{{ $carsCount}}</div>
                    <div class="text-lg font-light">{{ __('messages.cars_available') }}</div>
                </div>
                <div>
                    <div class="text-5xl font-extrabold mb-1">{{ $companiesCount }}</div>
                    <div class="text-lg font-light">{{ __('messages.companies') }}</div>
                </div>
                <div> 
                    <div class="text-5xl font-extrabold mb-1">99%</div>
                    <div class="text-lg font-light">{{ __('messages.on_time_delivery') }}</div>
                </div>
            </div>
        </div>
        
            
            <!-- Link to About Us -->
            <section class="text-center mt-12">
                <a href="{{ route('about') }}" class="text-lg font-medium text-blue-600 hover:text-blue-800 transition">
                    {{ __('messages.learn_more_about') }} 
                </a>
            </section>
        </div>
    </main>

    <!-- JavaScript for Slider Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.slide');
            const indicators = document.querySelectorAll('.indicator');
            let currentSlide = 0;
            const totalSlides = slides.length;
            let slideInterval;

            // Function to update the display
            function updateSlider() {
                slides.forEach((slide, index) => {
                    // Hide all slides
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'z-0');

                    // Set active slide
                    if (index === currentSlide) {
                        slide.classList.remove('opacity-0', 'z-0');
                        slide.classList.add('opacity-100', 'z-10');
                    }
                });

                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.remove('opacity-100');
                    indicator.classList.add('opacity-50');
                    if (index === currentSlide) {
                        indicator.classList.add('opacity-100');
                        indicator.classList.remove('opacity-50');
                    }
                });
            }

            // Public function to change slide (used by buttons)
            window.changeSlide = (direction) => {
                resetInterval();
                currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
                updateSlider();
            };

            // Public function to jump to a specific slide (used by dots)
            window.goToSlide = (index) => {
                resetInterval();
                currentSlide = index;
                updateSlider();
            };

            // Function to start the automatic rotation
            function startInterval() {
                slideInterval = setInterval(() => {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    updateSlider();
                }, 5000); // Change slide every 5 seconds
            }

            // Function to clear and restart the automatic rotation
            function resetInterval() {
                clearInterval(slideInterval);
                startInterval();
            }

            // Initialize the slider
            updateSlider();
            startInterval();
        });
    </script>
</x-layout>































