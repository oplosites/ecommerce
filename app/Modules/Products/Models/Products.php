<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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

    private $baseModule = 'App\Modules\Products\Models';

    public function productType()
    {
        return $this->belongsTo("$this->baseModule\ProductTypes");
    }

    public function productImages()
    {
        return $this->hasMany("$this->baseModule\ProductImages", 'product_id');
    }

    public function uploader()
    {
        return $this->belongsTo("$this->baseModule\Users");
    }

    public function categories()
    {
        return $this->belongsToMany("$this->baseModule\Categories", 'product_categories', 'product_id', 'category_id');
    }
}
