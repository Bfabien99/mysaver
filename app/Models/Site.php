<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = "sites";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'url',
        'cat_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
