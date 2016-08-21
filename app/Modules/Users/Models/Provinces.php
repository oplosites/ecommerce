<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_by',
        'updated_by',
        'country_id',
    ];

    public function cities()
    {
        return $this->hasMany('App\Models\City', 'city_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
