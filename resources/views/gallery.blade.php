<x-layout title="Gallery">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-blue-900 mb-4 tracking-tight">
               {{ __('messages.title_cards') }}
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ __('messages.card_description') }}
            </p>
        </div>

        <!-- Image Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            
            <!-- Image Card 1: Modern Truck (Using Placeholder) -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-blue-500/50 hover:scale-[1.02]">
                <!-- Placeholder image URL is used since assets like 'images/image.jpg' are not available in this environment -->
                 <img src="{{ asset('images/mercedes.jpg') }}" 
                     alt="Traksi Flagship Truck" 
                     class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-2">{{ __('messages.cards_title1') }}</h2>
                    <p class="text-gray-700 text-sm">{{ __('messages.cards_text1') }}</p>
                </div>
            </div>

            <!-- Image Card 2: Logistics Fleet -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-blue-500/50 hover:scale-[1.02]">
                   <img src="{{ asset('images/image.jpg') }}" 
                     alt="Traksi Logistics Fleet" 
                     class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-2">{{ __('messages.cards_title2') }}</h2>
                    <p class="text-gray-700 text-sm">{{ __('messages.cards_text2') }}</p>
                </div>
            </div>

            <!-- Image Card 3: Warehouse Loading -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-blue-500/50 hover:scale-[1.02]">
               <img src="{{ asset('images/mercedes.jpg') }}" 
                     alt="Traksi Warehouse Loading" 
                     class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-2">{{ __('messages.cards_title3') }}</h2>
                    <p class="text-gray-700 text-sm">{{ __('messages.cards_text3') }}</p>
                </div>
            </div>

            <!-- Image Card 4: Long Haul Truck -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-blue-500/50 hover:scale-[1.02]">
                 <img src="{{ asset('images/image.jpg') }}" 
                     alt="Traksi Long Haul Truck" 
                     class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-2">{{ __('messages.cards_title4') }}</h2>
                    <p class="text-gray-700 text-sm">{{ __('messages.cards_text4') }}</p>
                </div>
            </div>

            <!-- Image Card 5: Maintenance Bay -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-blue-500/50 hover:scale-[1.02]">
                 <img src="{{ asset('images/mercedes.jpg') }}" 
                     alt="Traksi Maintenance Bay" 
                     class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-2">{{ __('messages.cards_title5') }}</h2>
                    <p class="text-gray-700 text-sm">{{ __('messages.cards_text5') }}</p>
                </div>
            </div>

            <!-- Image Card 6: Secure Delivery -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-blue-500/50 hover:scale-[1.02]">
                <img src="{{ asset('images/image.jpg') }}" 
                     alt="Traksi Secure Delivery" 
                     class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-2">{{ __('messages.cards_title6') }}</h2>
                    <p class="text-gray-700 text-sm">{{ __('messages.cards_text6') }}</p>
                </div>
            </div>

        </div>
    </div>
</x-layout>