<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UserRegExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:regexpired {user-id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Broadcast an event when a user registration has expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $userId = $this->argument('user-id');
        try
        {
            $user = User::findOrFail($userId); /** @var $user User */

            event(new \App\Events\UserRegExpired($user));
            Log::debug("New UserRegExpired event fired for user : ".$user->name);
            $this->info("New UserRegExpired event fired for user : ".$user->name);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            $this->error("No user found for id : $userId, please try again");
        }
        catch (\Exception $e){
            $this->error("Error! ".$e->getMessage());
        }
    }
}
