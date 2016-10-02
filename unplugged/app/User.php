<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\UserRoles;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function isAdministrator()
    {
        return $this->role == UserRoles::Administrator;
    }

    public function isNormal()
    {
        return $this->role == UserRoles::Normal;
    }
    public function fullName()
    {
        return ucfirst($this->name);
    }
}
