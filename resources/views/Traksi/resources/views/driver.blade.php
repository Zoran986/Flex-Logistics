<x-layout>

    <div class="py-12 bg-white">
        <h2 class="text-3xl font-bold text-center mb-12">Driver Information</h2>
        
        <div class="max-w-2xl mx-auto bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold mb-2">Driver Name: {{ $driver->name }}</h3>
            <p class="mb-4">Route: {{ $driver->route }}</p>
            <p class="text-gray-600">Contact: {{ $driver->contact }}</p>
        </div>
    </div>

</x-layout>