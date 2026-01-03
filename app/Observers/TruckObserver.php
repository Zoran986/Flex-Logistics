<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Truck;
use Filament\Notifications\Notification;

class TruckObserver
{
    /**
     * Handle the Truck "created" event.
     */
    public function created(Truck $truck): void
    {
        //
    }

    /**
     * Handle the Truck "updated" event.
     */
    public function updated(Truck $truck): void
    {
       
          if (! $truck->wasChanged('expire_date')) {
        return;
    }

    $users = User::select('id')->get();

    foreach ($users as $user) {
        Notification::make()
            ->title('Truck registration updated')
            ->body(
                "Truck {$truck->plate_number} expires on {$truck->expire_date}. " )
            ->date('d/m/Y')
            ->warning()
            ->sendToDatabase($user)
            ->broadcast($user);
    }
    }
 
    

    /**
     * Handle the Truck "deleted" event.
     */
    public function deleted(Truck $truck): void
    {
        //
    }

    /**
     * Handle the Truck "restored" event.
     */
    public function restored(Truck $truck): void
    {
        //
    }

    /**
     * Handle the Truck "force deleted" event.
     */
    public function forceDeleted(Truck $truck): void
    {
        //
    }
}
