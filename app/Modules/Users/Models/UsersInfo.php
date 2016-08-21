<?php

namespace App\Modules\Users\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersInfo extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_address', 'user_city_id', 'user_phone', 'user_sex', 'user_birth_date',
        'shipment_address', 'shipment_city_id', 'shipment_pic', 'shipment_phone',
    ];

    private $baseModule = 'App\Modules\Users\Models';

    public function user()
    {
        return $this->belongsTo("$this->baseModule\Users");
    }

}
