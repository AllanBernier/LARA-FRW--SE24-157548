<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_img_url',
        'author_fullname',
        'nb_sales'
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
