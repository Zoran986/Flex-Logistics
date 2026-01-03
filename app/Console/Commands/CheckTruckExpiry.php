<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Truck;
use Filament\Actions\Action;
use Illuminate\Console\Command;
use Filament\Notifications\Notification;


class CheckTruckExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trucks:check-expiry';
   

    /**
     * The console command description.
     *
     * @var string
     */
     protected $description = 'Send notification when truck expiry is one month away';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $users = User::all();

    $trucks = Truck::whereBetween('expire_date', [
        now()->startOfDay(),
        now()->addDays(7)->endOfMonth(),
    ])->get();

    foreach ($trucks as $truck) {
        foreach ($users as $user) {

            $alreadyNotified = $user->notifications()
                ->where('type', \Filament\Notifications\DatabaseNotification::class)
                ->where('data->body', 'like', '%'.$truck->plate_number.'%')
                ->exists();

            if ($alreadyNotified) {
                continue;
            }

            Notification::make()
                ->title('Registration Expire Soon')
                ->body("Truck {$truck->plate_number} expires on {$truck->expire_date->format('d/m/Y')}")
                ->warning()
                ->sendToDatabase($user); // ✅ ВАЖНО
        }
    }

    return self::SUCCESS;


    }

}