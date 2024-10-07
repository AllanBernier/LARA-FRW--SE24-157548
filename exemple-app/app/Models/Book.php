<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'nb_pages',
        'price',
        'summary'
    ];


    public function bookDetails() {
        return $this->hasOne(BookDetails::class);
    }


    public function pages() {
        return $this->hasMany(Pages::class);
    }
}