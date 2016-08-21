<?php

namespace App\Modules\Users\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
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

    private $baseModule = 'App\Modules\Users\Models';

    public function info()
    {
        return $this->hasOne("$this->baseModule\UsersInfo");
    }

}
