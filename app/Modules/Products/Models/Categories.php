<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Products');
    }
}
