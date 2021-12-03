<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'street',
        'city',
        'province',
        'zip_code',
        'email',
        'phone_no',
    ]; 
}
