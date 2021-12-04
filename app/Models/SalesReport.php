<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'emp_id',
        'sales_invoice_no',
        'total_price',
        'cash',
        'change',
        'vatable_sale',
        'vat_amount',
        'created_at',
        'updated_at',
    ]; 
}
