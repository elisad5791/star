<?php

namespace App\Console\Commands\Show;

use App\Http\Resources\Console\RoleResource;
use App\Models\Role;
use Illuminate\Console\Command;

class showRoleCommand extends Command
{
    protected $signature = 'show:roles';
    protected $description = 'Show all roles';

    public function handle()
    {
        $roles = RoleResource::collection(Role::all())->resolve();
        dd($roles);
    }
}
