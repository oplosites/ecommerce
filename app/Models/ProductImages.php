<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Products');
    }
}
