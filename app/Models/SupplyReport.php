<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'product_id',
        'supplier_id',
        'quantity',
        'amount',
        'type',
    ];
}
