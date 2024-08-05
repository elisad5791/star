<?php

namespace App\Models\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($role) {
        return $this->roles->contains('title', $role);
    }

    public function hasPermission($permission) {
        return $this->permissions->contains('title', $permission);
    }

    public function hasPermissionThroughRole($permission)
    {
        $permissionObj = Permission::where('title', $permission)->first();
        foreach ($permissionObj->roles as $role) {
            if ($this->roles->contains('title', $role->title)) {
                return true;
            }
        }

        return false;
    }

    public function hasPermissionFinally($permission)
    {
        return $this->hasPermission($permission) || $this->hasPermissionThroughRole($permission);
    }
}
