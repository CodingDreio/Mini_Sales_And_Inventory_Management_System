<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'sales_report_id',
        'product_id',
        'quantity',
        'discount',
        'discount_type',
        'total_price',
    ]; 
}
