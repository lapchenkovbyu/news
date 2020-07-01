<?php

namespace App\Console\Commands;

use App\Support\ACL\Roles;
use App\User;
use Illuminate\Console\Command;

class PromoteUserToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:promote {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promotes user with given email to be Admin';

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
        $user = User::where('email', $this->argument('email'))->first();

        if (!$user) {
            $this->error('There is no user with given email');
            return;
        } else {
          $user->syncRoles([Roles::ADMIN]);
          $this->info('User successfully promoted.');
        }
    }
}
