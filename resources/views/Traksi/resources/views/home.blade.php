<x-layout>

    <div class="">
        <img src="{{ asset('images/image.jpg') }}" 
        alt="Traksi Logo">  <!-- Adjust height as needed -->
        <div class="py-12 bg-white">
            <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition">
                    <div class="text-blue-900 mb-4">
                        <svg class="w-12 h-12">...</svg> <!-- Truck icon -->
                    </div>
                    <h3 class="text-xl font-bold mb-2">Freight Transportation</h3>
                    <p>Full truckload (FTL) and less than truckload (LTL) services across the region.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition">
                    <div class="text-blue-900 mb-4">
                        <svg class="w-12 h-12">...</svg> <!-- Warehouse icon -->
                    </div>
                    <h3 class="text-xl font-bold mb-2">Warehousing</h3>
                    <p>Secure storage solutions with 24/7 monitoring and inventory management.</p>
                </div>
                
                <!-- Service 3 -->
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition">
                    <div class="text-blue-900 mb-4">
                        <svg class="w-12 h-12">...</svg> <!-- Logistics icon -->
                    </div>
                    <h3 class="text-xl font-bold mb-2">Logistics Solutions</h3>
                    <p>End-to-end supply chain management tailored to your business needs.</p>
                </div>
            </div>
        </div>
        <div class="py-12 bg-blue-900 text-white text-center">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="text-4xl font-bold mb-2">5+</div>
                    <div>Years in Business</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">5+</div>
                    <div>Trucks in Fleet</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">100+</div>
                    <div>Satisfied Clients</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">99%</div>
                    <div>On-Time Delivery</div>
                </div>
            </div>
        </div>
        <div class="py-12 bg-white">
            <h2 class="text-3xl font-bold text-center mb-12">What Our Clients Say</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/client1.jpg') }}" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">John Smith</h4>
                            <p class="text-gray-600">ABC Manufacturing</p>
                        </div>
                    </div>
                    <p>"Traksi has been our trusted logistics partner for 5 years. Their reliability and professional service are unmatched in the industry."</p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/client2.jpg') }}" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Sarah Johnson</h4>
                            <p class="text-gray-600">Global Distributors</p>
                        </div>
                    </div>
                    <p>"We switched to Traksi last year and saw a 30% improvement in delivery times. Their team is responsive and solutions-oriented."</p>
                </div>
            </div>
        </div>
    </div>
    

</x-layout>