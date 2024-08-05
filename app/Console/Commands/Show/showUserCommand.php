<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\UserResource;
use App\Models\User;
use Illuminate\Console\Command;

class showUserCommand extends Command
{
    protected $signature = 'show:users';
    protected $description = 'Show all users';

    public function handle()
    {
        $users = UserResource::collection(User::all())->resolve();
        dd($users);
    }
}
