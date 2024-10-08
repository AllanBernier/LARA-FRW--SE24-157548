<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'bar_code',
        'description',
        'image_url'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }



    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($productDetails) {
            if (Storage::exists($productDetails->image_url)) {
                Storage::delete($productDetails->image_url);
            }
        });   
    }
}
