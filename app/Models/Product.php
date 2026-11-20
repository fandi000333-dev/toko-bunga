<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar kolom-kolom berikut diizinkan untuk diisi
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'is_featured',
    ];
}