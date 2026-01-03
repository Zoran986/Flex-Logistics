<x-layout title="About Us">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            
            <!-- Hero Header -->
            <header class="text-center mb-16 bg-blue-50 p-10 rounded-3xl shadow-lg">
                <h1 class="text-4xl font-extrabold text-blue-400 mb-4 tracking-tight ">
                    {{ __('messages.about_header_title') }}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __('messages.about_header_desc') }}
                </p>
            </header>
            
            <div class="space-y-16">
                
                <!-- Section 1: Our Story -->
                <section class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-blue-800 mb-4 border-l-4 border-blue-500 pl-4">{{ __('messages.about_section1_title') }}</h2>
                        <p class="text-gray-700 leading-loose">
                            {{ __('messages.about_section1_text')}}
                        </p>
                    </div>
                    <!-- Placeholder Image/Icon for Story -->
                    <div class="rounded-xl overflow-hidden shadow-2xl">
                        <img src="https://placehold.co/600x400/3B82F6/FFFFFF?text=Since+2019" 
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/3B82F6/FFFFFF?text=od 2019'"
                             alt="Traksi history graphic" class="w-full h-auto object-cover">
                    </div>
                </section>
                
                <!-- Section 2: Our Mission & Values (Enhanced) -->
                <section>
                    <h2 class="text-3xl font-bold text-center text-blue-800 mb-10 border-b pb-4">{{ __('messages.about_section2_title')}}</h2>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        
                        <!-- Mission -->
                        <div class="bg-white p-6 rounded-xl shadow-xl border-t-4 border-blue-600">
                            <h3 class="text-xl font-bold text-blue-900 mb-3">{{ __('messages.mission_title') }}</h3>
                            <p class="text-gray-700">
                                {{ __('messages.mission_text') }}
                            </p>
                        </div>

                        <!-- Vision -->
                        <div class="bg-white p-6 rounded-xl shadow-xl border-t-4 border-blue-600">
                            <h3 class="text-xl font-bold text-blue-900 mb-3">{{ __('messages.vision_title') }}</h3>
                            <p class="text-gray-700">
                                {{ __('messages.vision_text') }}
                            </p>
                        </div>

                        <!-- Values -->
                        <div class="bg-white p-6 rounded-xl shadow-xl border-t-4 border-blue-600">
                            <h3 class="text-xl font-bold text-blue-900 mb-3">{{ __('messages.values_title') }}</h3>
                            <ul class="text-gray-700 list-disc list-inside space-y-1 text-sm">
                                <li>{{ __('messages.value_integrity') }}</li>
                                <li>{{ __('messages.value_safety') }}</li>
                                <li>{{ __('messages.value_punctuality') }}</li>
                                <li>{{ __('messages.value_innovation') }}</li>
                            </ul>
                        </div>
                    </div>
                </section>
                
                <!-- Section 3: Technology and Fleet -->
                <section class="bg-blue-900 text-white p-12 rounded-2xl shadow-2xl">
                    <h2 class="text-3xl font-bold text-blue-300 mb-6 border-b border-blue-700 pb-3">{{ __('messages.fleet_title') }}</h2>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <p class="leading-loose text-blue-100">
                                {{ __('messages.fleet_text1') }}
                            </p>
                            <p class="mt-4 leading-loose text-blue-100">
                                {{ __('messages.fleet_text2') }}
                        </div>
                        
                        <div class="flex flex-col space-y-4">
                            <div class="flex items-center space-x-3 bg-blue-800 p-4 rounded-lg">
                                <span class="text-blue-300 text-2xl font-bold">✓</span>
                                <p class="font-semibold">{{ __('messages.fleet_point1') }}</p>
                            </div>
                            <div class="flex items-center space-x-3 bg-blue-800 p-4 rounded-lg">
                                <span class="text-blue-300 text-2xl font-bold">✓</span>
                                <p class="font-semibold">{{ __('messages.fleet_point2') }}</p>
                            </div>
                            <div class="flex items-center space-x-3 bg-blue-800 p-4 rounded-lg">
                                <span class="text-blue-300 text-2xl font-bold">✓</span>
                                <p class="font-semibold">{{ __('messages.fleet_point3') }}</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Section 4: Our Team -->
                <section>
                    <h2 class="text-3xl font-bold text-blue-800 mb-6 border-l-4 border-blue-500 pl-4">{{ __('messages.team_title') }}</h2>
                    <p class="text-gray-700 leading-loose max-w-4xl">
                        {{ __('messages.team_text') }}
                    </p>
                </section>

                <!-- CTA Footer -->
                <div class="text-center pt-8">
                    <p class="text-xl text-gray-700 mb-6">{{ __('messages.cta_ready') }}</p>
                    <a href="{{ route('contact') }}" class="inline-block px-10 py-4 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition duration-300 transform hover:scale-105 shadow-xl">
                        {{ __('messages.cta_button') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout>