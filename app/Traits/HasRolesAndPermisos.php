<?php

namespace App\Traits;

use App\Permiso;
use App\Role;

trait HasRolesAndPermisos
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permiso::class,'users_permisos');
    }
        /**
     * Check if the user has Role
     *
     * @param [type] $role
     * @return boolean
     */
    public function hasRole($role)
    {

        if ($this->roles->contains('slug', $role)) {
            return true;
        }


        return false;
    }

}
