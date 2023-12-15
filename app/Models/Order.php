<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'mobile',
        'email',
        'line1',
        'line2',
        'city',
        'postalcode',
      
    ];
}