<?php

namespace App\Modules\PaymentMethods\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_methods';

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
        'stock',
        'purchase_price',
        'selling_price',
        'product_type_id',
        'user_id',
    ];

    public function productType()
    {
        return $this->belongsTo('App\Models\ProductTypes');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImages', 'product_id');
    }

    public function uploader()
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Categories', 'product_categories', 'product_id', 'category_id');
    }
}
