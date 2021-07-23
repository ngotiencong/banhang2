<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    
     protected $fillable = [
       'email','pass','name','adress','phone','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
    
     */
    protected $hidden = [
        'customers_pass',
        'customers_rememberToken',
    ];
}
