<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'numero'
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
