<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities';

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
        'province_id',
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }
}
