<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
  public function category()
  {
    return $this->hasOne(category::class,'id','category_id');
  }
    protected $hidden = [
       'created_at',
       'updated_at' 
    ];
}
