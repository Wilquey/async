<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Jobs\MlaExample;
use Illuminate\Console\Command;
use App\Notifications\BeerIsCold;
use Illuminate\Support\Facades\Notification;

class Example extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // for($i=0; $i<1; $i++) {
        //     dispatch(new MlaExample());
        // }

        // $user = User::first();
        // $user->notify(new BeerIsCold());

        $user = User::first();
        $user->notify(new BeerIsCold());
        // Notification::send($users, new BeerIsCold());

        return Command::SUCCESS;
    }
}
