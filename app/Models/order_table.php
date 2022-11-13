<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_table extends Model
{
    use HasFactory;
    protected $fillable = [
        'cost',
        'name',
        'email',
        'status',
        'phone',
        'city',
        'adress',
        'date',
    ];
}
