<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {email} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates user with given email';

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
     * @throws \Exception
     */
    public function handle()
    {
        $password = Str::random(8);
        $user = User::create([
            'name'=>'Generated user',
            'email'=>$this->argument('email'),
            'password' => bcrypt($password),
            'email_verified_at' => now()
        ]);

        if ($user->exists){
            $this->info('User created. User\'s password is ' . $password);
        } else {
            $this->error('Something went wrong.');
        }
    }
}
