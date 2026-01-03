<?php

use App\Models\Driver;
use App\Models\User; // Assuming User model is required for authentication
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);



test('driver can be created via form', function () {
    $driverData = [
        'name' => 'Test Driver',
        'status' => true,
        'license_number' => 'ABC123',
        'phone_number' => '1234567890',
        'registration_date' => '2024-01-01',
    ];

    $response = $this->post(route('filament.resources.drivers.create'), $driverData);

    $response->assertRedirect(route('filament.resources.drivers.index'));

    $this->assertDatabaseHas('drivers', [
        'name' => 'Test Driver',
        'license_number' => 'ABC123',
    ]);
});

