<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Truck;
use Filament\Actions\Action;
use Illuminate\Console\Command;
use Filament\Notifications\Notification;

class CheckTruckRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-truck-registration';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expiring registrations and notify users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       // 1. Find the expiring trucks
    $expiringTrucks = Truck::whereBetween('expire_date', [
        now()->toDateString(),
        now()->addMonth()->toDateString(),
    ])->get();

    if ($expiringTrucks->isEmpty()) {
        $this->info('No trucks expiring soon.');
        return;
    }

    // 2. Define who gets the notification
    // Option A: All users who can access the admin panel
    $recipients = User::all(); 
    
    // Option B: Only specific admins (Recommended)
    // $recipients = \App\Models\User::where('is_admin', true)->get();

    foreach ($expiringTrucks as $truck) {
        Notification::make()
            ->title('Registration Expiry')
            ->warning()
            ->body("Truck #{$truck->id} is expiring on {$truck->expire_date->format('d/m/Y')}")
            ->actions([
                Action::make('view')
                ->button()
                ->url(fn () => route('filament.admin.resources.trucks.edit', ['record' => $truck])),
                        ])
            ->sendToDatabase($recipients); // Filament can send to a collection of users!
    }

    $this->info('Notifications sent to ' . $recipients->count() . ' users.');
}
}
