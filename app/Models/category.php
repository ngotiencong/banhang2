<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
  use HasFactory;
  protected $table = 'category';
  protected $fillable = [
    'name',
    'slug',
    'img'
  ];

  public function product()
  {
    return $this->hasMany(products::class,'category_id','id');  
  }
  protected $hidden = [];
}
