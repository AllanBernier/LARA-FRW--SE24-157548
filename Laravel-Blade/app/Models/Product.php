<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'price', 'description', 'stock'
    ];


    public function scopePriceBetween($query, $min, $max){
        return $query->whereBetween('price', [$min, $max]);
    }

    //$query->priceBetween(100,200);


    protected static function booted(){

        static::addGlobalScope('limit', function ($query) {
            $query->where('price', '<', 250);
        });

    }
}
