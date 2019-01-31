<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{   
    protected $table = 'orderhistory';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number',
        'store_name', 
        'order_total', 
        'date_order',
        'products'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = [
        'date_order'
    ];
}
