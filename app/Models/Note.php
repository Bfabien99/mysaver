<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "notes";
    protected $fillable = [
        'title',
        'slug',
        'content',
        'url',
        'tags',
        'cat_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
