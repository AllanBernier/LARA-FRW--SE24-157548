<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description'
    ];
 
    public function details() {
        return $this->hasOne(ProductDetails::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    } 

}
