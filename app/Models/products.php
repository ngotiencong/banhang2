<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
     protected $fillable = [
      'name',	
      'slug',	
      'amount',	
      'desc',	
      'content',	
      'img',
      'status'	
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
    
     */
    protected $hidden = [
       'created_at',
       'updated_at' 
    ];
}
