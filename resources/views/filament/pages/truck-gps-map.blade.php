<x-filament::page>
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">

        {{-- TABLE --}}
        <div class="xl:col-span-1 border rounded-lg p-2">
            <h2 class="font-bold mb-2">Trucks</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border p-1">Plate</th>
                        <th class="border p-1">Model</th>
                        <th class="border p-1">Last Speed</th>
                        <th class="border p-1">Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->getTrucksWithLocations() as $truck)
                        @php
                            $lastLocation = collect($truck['locations'])->sortByDesc('recorded_at')->first();
                        @endphp
                        <tr>
                            <td class="border p-1">{{ $truck['plate_number'] }}</td>
                            <td class="border p-1">{{ $truck['model'] }}</td>
                            <td class="border p-1">{{ $lastLocation['speed'] ?? '-' }}</td>
                            <td class="border p-1">{{ $lastLocation['recorded_at'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- MAP --}}
        <div class="xl:col-span-2">
            <div id="map" style="height:600px; border:1px solid black;"></div>
        </div>

    </div>

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const map = L.map('map').setView([41.9981, 21.4254], 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            let markers = {};
            let polylines = {};

            const trucks = @json($this->getTrucksWithLocations());

            // Initial load: polyline + markers
            trucks.forEach(truck => {
                const path = truck.locations
                    .sort((a,b) => new Date(a.recorded_at) - new Date(b.recorded_at))
                    .map(loc => [parseFloat(loc.latitude), parseFloat(loc.longitude)])
                    .filter(coord => !coord.includes(NaN));

                if(path.length === 0) return;

                // Polyline
                polylines[truck.plate_number] = L.polyline(path, { color: 'blue' }).addTo(map);

                // Last location
                const last = path[path.length -1];
                const lastLoc = truck.locations[truck.locations.length -1];

                const icon = L.icon({
                    iconUrl: '/images/delivery-truck.png', // стави path до икона на камион
                    iconSize: [32,32],
                    iconAnchor: [16,32],
                    popupAnchor: [0,-32],
                });

                markers[truck.plate_number] = L.marker(last, {icon: icon})
                    .addTo(map)
                    .bindPopup(`
                        <b>${truck.plate_number}</b><br>
                        Model: ${truck.model}<br>
                        Speed: ${lastLoc.speed} km/h<br>
                        Updated: ${lastLoc.recorded_at}
                    `);
            });

            // Auto-fit map
            const allLayers = [...Object.values(markers), ...Object.values(polylines)];
            if(allLayers.length > 0){
                const group = L.featureGroup(allLayers);
                map.fitBounds(group.getBounds().pad(0.2));
            }

            // Auto-refresh: само маркери
            setInterval(() => {
                fetch("{{ route('truck.locations.latest') }}")
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(truck => {
                            if(!truck.latitude || !truck.longitude) return;
                            const latlng = [parseFloat(truck.latitude), parseFloat(truck.longitude)];
                            if(markers[truck.plate_number]){
                                markers[truck.plate_number].setLatLng(latlng);
                                markers[truck.plate_number].setPopupContent(`
                                    <b>${truck.plate_number}</b><br>
                                    Model: ${truck.model}<br>
                                    Speed: ${truck.speed} km/h<br>
                                    Updated: ${truck.recorded_at}
                                `);
                            }
                        });
                    });
            }, 10000);

        });
    </script>
</x-filament::page>
