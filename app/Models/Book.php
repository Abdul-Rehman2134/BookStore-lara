<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function author(){
      return $this->belongsTo(Author::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function orderItems(){
        return $this->hasMany(Order_item::class);
    }
}
