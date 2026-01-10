<nav class="bg-gray-600 text-white shadow-lg">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center px-10">
            <div class="flex items-center space-x-2">
                <!-- Logo Image -->
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/flex-logo.png') }}" 
                         alt="Traksi Logo" 
                         class="h-12 w-auto rounded-lg o"> <!-- Added rounded corners for style -->
                </a>
            </div>

            <div class="flex items-center space-x-2 text-sm font-medium">
            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="text-blue-700 hover:text-blue-600 transition duration-150 p-1 rounded-md border border-transparent hover:border-blue-300">
                EN
            </a>
            <span class="text-gray-400">|</span>
            <a href="{{ LaravelLocalization::getLocalizedURL('mk') }}" class="text-blue-700 hover:text-blue-600 transition duration-150 p-1 rounded-md border border-transparent hover:border-blue-300">
                MК
            </a>
        </div>
            
            <div class="hidden md:flex space-x-8 items-center font-semibold">
                <!-- Navigation links use blue-200 hover for contrast -->
                <a href="{{ route('about') }}" class="hover:text-blue-400 transition duration-200 {{ request()->routeIs('about') ? 'text-blue-300 font-bold' : '' }}">{{ __('messages.about_us') }}</a>
                <a href="{{ route('gallery') }}" class="hover:text-blue-400 transition duration-200 {{ request()->routeIs('gallery') ? 'text-blue-300 font-bold' : '' }}">{{ __('messages.gallery') }}</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-400 transition duration-200 {{ request()->routeIs('contact') ? 'text-blue-300 font-bold' : '' }}">{{ __('messages.contact') }}</a>
            </div>
            
            <!-- Mobile menu button -->
            <button class="md:hidden focus:outline-none" onclick="toggleMenu()">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobileMenu" class="md:hidden hidden mt-4 space-y-2 pb-2 border-t border-blue-800 pt-2">
            <a href="{{ route('about') }}" class="block text-white hover:bg-blue-800 px-3 py-2 rounded transition duration-200">{{ __('messages.about_us') }}</a>
            <a href="{{ route('gallery') }}" class="block text-white hover:bg-blue-800 px-3 py-2 rounded transition duration-200">{{ __('messages.gallery') }}</a>
            <a href="{{ route('contact') }}" class="block text-white hover:bg-blue-800 px-3 py-2 rounded transition duration-200">{{ __('messages.contact') }}</a>
        </div>
    </div>
    
    <script>
        // Simple JavaScript for toggling the mobile menu
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</nav>