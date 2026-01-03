
<?php

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create an invoice', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post('/invoices', [
        'invoice_number' => 1001,
        'date_issued' => now()->toDateString(),
        'due_date' => now()->addDays(7)->toDateString(),
        'total' => 1500,
        'status' => 'unpaid',
    ]);

    $response->assertStatus(302); // redirect after save

    $this->assertDatabaseHas('invoices', [
        'invoice_number' => 1001,
        'total' => 1500,
        'status' => 'unpaid',
    ]);
});