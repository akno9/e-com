<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'nom',
        'url',
        'description',
        'statut',
        'populaire',
        'image',
        'meta_titre',
        'meta_desc',
        'meta_motCle',
    ];
}
