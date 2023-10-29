<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'count',
        'is_published',
        'photo_url',
        'title',
        'cost',
        'country',
        'release_year',
        'model',
    ];
}
