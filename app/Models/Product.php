<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'nom',
        'mini_desc',
        'description',
        'prix_orig',
        'prix_vente',
        'image',
        'qte',
        'taxe',
        'statut',
        'populaire',
        'meta_titre',
        'meta_desc',
        'meta_motCle',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
