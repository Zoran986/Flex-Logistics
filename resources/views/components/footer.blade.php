<footer class="bg-gray-600 text-white py-12 mt-16 shadow-inner">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            
            <!-- Column 1: Company Info -->
            <div>
                <h3 class="text-2xl font-extrabold mb-4 text-blue-300">{{ __('messages.footer_company_title') }}</h3>
                <p class="text-sm text-blue-200 leading-relaxed">
                    {{ __('messages.footer_company_description') }}
                </p>
            </div>
            
            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-4">{{ __('messages.quick_links') }}</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-blue-100 hover:text-blue-400 transition duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        {{ __('messages.about_us') }}
                    </a></li>
                    <li><a href="{{ route('gallery') }}" class="text-blue-100 hover:text-blue-400 transition duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M22 16V4c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2zm-11-4L9 9l-2 3h4zm11 0l-3-3-2 3h5zM4 20h14v2H4c-1.1 0-2-.9-2-2V6h2v14z"/></svg>
                        {{ __('messages.gallery') }}
                    </a></li>
                    <li><a href="{{ route('contact') }}" class="text-blue-100 hover:text-blue-400 transition duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        {{ __('messages.contact') }}
                    </a></li>
                </ul>
            </div>
            
            <!-- Column 3: Contact Info -->
            <div>
                <h3 class="text-xl font-bold mb-4">{{ __('messages.get_in_touch') }}</h3>
                <address class="text-blue-100 text-sm space-y-3 not-italic">
                    <p class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-blue-400 mt-1 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                       {{ __('messages.address') }}
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-blue-400" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V6h16v12zM12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/></svg>
                        Email: <a href="mailto:info@flexlogistics.com" class="hover:underline ml-1">info@flexlogistics.com</a>
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-blue-400" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                         {{ __('messages.phone') }} <a href="tel:+38975999222" class="hover:underline ml-1">(+389) 75999-222</a>
                    </p>
                </address>
            </div>

            <!-- Column 4: Social/CTA (New Column) -->
            <div>
                <h3 class="text-xl font-bold mb-4">{{ __('messages.follow_us') }}</h3>
                <div class="flex space-x-4 mb-6">
                    <!-- Placeholder Social Icons (use actual links) -->
                  
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" 
       aria-label="Visit us on Facebook"
       class="text-blue-400 hover:text-blue-600 transition duration-300 transform hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <!-- This path represents the Facebook 'f' logo using a clean stroke. -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
        </svg>
    </a>

    <!-- Instagram Icon (Updated to outline style) -->
    <a href="https://www.instagram.com/?locale=mk_MK" target="_blank" rel="noopener noreferrer" 
       aria-label="Visit us on Instagram"
       class="text-blue-400 hover:text-blue-600 transition duration-300 transform hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
        </svg>
    </a>
                </div>
                
                <h3 class="text-xl font-bold mb-4">{{ __('messages.need_quote') }}</h3>
                <a href="{{ route('contact') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-600 transition duration-300 transform hover:scale-105 shadow-lg">
                    {{ __('messages.request_pricing') }}
                </a>
            </div>
        </div>
        
        <div class="border-t border-blue-800 mt-12 pt-6 text-center">
            <p class="text-blue-300 text-sm"> &copy;  {{ date('Y') }}  Flex Logistics Ltd.</p>
        </div>
    </div>

</footer>   