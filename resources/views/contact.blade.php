<x-layout title="Contact Us">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
            
            <!-- Header Section -->
            <div class="text-center py-12 bg-blue-50">
                <h1 class="text-4xl font-extrabold text-blue-900 mb-2">{{ __('messages.header_title') }}</h1>
                <p class="text-lg text-gray-600">{{ __('messages.header_text') }}</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 p-8 md:p-12">
                
                <!-- Contact Information (Left Column) -->
                <div class="space-y-10">
                    <h2 class="text-2xl font-bold text-blue-800 border-b pb-2 mb-6">{{ __('messages.details_title') }}</h2>
                    
                    <div class="space-y-6">
                        
                        <!-- Headquarters -->
                        <div class="flex items-start space-x-4">
                            <!-- Icon: Map Pin -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700 mt-1 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ __('messages.hq_title') }}</h3>
                                <p class="text-gray-600">{{ __('messages.hq_address') }}</p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <!-- Icon: Phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700 mt-1 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.89 5.28 6.72 6.72l2.44-2.44c.2-.2.47-.28.71-.2.65.18 1.35.28 2.07.28.55 0 1 .45 1 1v3.5c0 .55-.45 1-1 1C10.77 22 2 13.23 2 3c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 .72.1 1.42.28 2.07.08.24 0 .51-.2.71L6.62 10.79z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ __('messages.phone_title') }}</h3>
                                <a href="tel:+38975321222" class="text-blue-600 hover:text-blue-800 transition">(+389) 75321-222</a>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <!-- Icon: Mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700 mt-1 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ __('messages.email_title') }}</h3>
                                <a href="mailto:info@traksi.com" class="text-blue-600 hover:text-blue-800 transition">info@traksi.com</a>
                            </div>
                        </div>
                        
                        <!-- Operating Hours -->
                        <div class="flex items-start space-x-4">
                            <!-- Icon: Clock -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700 mt-1 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm.5 13H11V8h1.5v7zM12 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ __('messages.hours_title') }}</h3>
                                <p class="text-gray-600">{{ __('messages.hours_week') }}</p>
                                <p class="text-gray-600">{{ __('messages.hours_saturday') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form (Right Column) -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-800 border-b pb-2 mb-6">{{ __('messages.form_title') }}</h2>
                    
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        @if(session('success'))
                            <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md text-sm font-medium animate-pulse">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.name') }}</label>
                            <input type="text" id="name" name="name" required 
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 transition duration-150">
                        </div>
                        
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.email') }}</label>
                            <input type="email" id="email" name="email" required 
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 transition duration-150">
                        </div>
                        
                        <!-- Phone Field (Optional) -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.phone_optional') }} </label>
                            <input type="tel" id="phone" name="phone" 
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 transition duration-150">
                        </div>
                        
                        <!-- Subject Field -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.subject') }}</label>
                            <input type="text" id="subject" name="subject" required 
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 transition duration-150">
                        </div>
                        
                        <!-- Message Field -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.message') }}</label>
                            <textarea id="message" name="message" rows="5" required 
                                      class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 transition duration-150"></textarea>
                        </div>
                        
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-900 text-white font-semibold tracking-wide py-3 rounded-xl hover:bg-blue-800 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-offset-2 shadow-lg hover:shadow-xl transform hover:scale-[1.01]">
                                {{ __('messages.send_button') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Optional: Map Placeholder -->
            <div class="p-8 md:p-12 border-t mt-8 bg-gray-50">
                <h3 class="text-xl font-bold text-center mb-4 text-gray-800"> {{ __('messages.location_title') }}</h3>
                <div class="h-64 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500 text-lg border border-gray-300 shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2964.711802951717!2d21.4395679!3d41.9961448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13540d9d0d3b6a09%3A0x8660e53a925f69f1!2zU3RyLiBEaW1vIEhhZHppIERpbW92IG51bSA3MSwgMTAwMCBTa29wamUsIE5vcnRoIE1hY2Vkb25pYQ!5e0!3m2!1sen!2smk!4v1678888888888!5m2!1sen!2smk"
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Location of Traksi Ltd Headquarters">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</x-layout>