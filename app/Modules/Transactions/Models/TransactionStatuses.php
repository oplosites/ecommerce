<?php

namespace App\Modules\Transactions\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionStatuses extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tx_statuses';

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

    public function transactions()
    {
        return $this->hasMany('App\Models\Transactions', 'transaction_id');
    }
}
