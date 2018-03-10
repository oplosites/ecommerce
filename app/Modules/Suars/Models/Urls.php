<?php

namespace App\Modules\Suars\Models;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'user_id',
    ];

    private $baseModule = 'App\Modules\Suars\Models';

    public function author()
    {
        return $this->belongsTo("$this->baseModule\Users");
    }
}
