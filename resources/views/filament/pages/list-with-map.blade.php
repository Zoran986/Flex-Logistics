<x-filament::page>
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">

        {{-- TABLE --}}
        <div class="xl:col-span-1">
            {{ $this->table }}
        </div>

        {{-- MAP --}}
        <div class="xl:col-span-2">
            <div id="map" class="h-[600px] rounded-xl"></div>
        </div>
    </div>

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([41.9981, 21.4254], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const trucks = @json($this->getTrucks());

        trucks.forEach(truck => {
            if (!truck.latest_location) return;

            L.marker([
                truck.latest_location.latitude,
                truck.latest_location.longitude
            ])
            .addTo(map)
            .bindPopup(`
                <b>${truck.plate_number}</b><br>
                Speed: ${truck.latest_location.speed ?? '-'} km/h<br>
                Updated: ${truck.latest_location.recorded_at}
            `);
        });
    </script>
</x-filament::page>