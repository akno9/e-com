<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'userId',
        'total_price',
        'name',
        'lname',
        'email',
        'phone',
        'adress1',
        'adress2',
        'city',
        'country',
        'status',
        'message',
        'tracking_no',
    ];
}
