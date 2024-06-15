<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = "accounts";
    protected $fillable = [
        'name',
        'url',
        'image_url',
        'username',
        'email',
        'phone',
        'password',
        'description',
        'more',
        'cat_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
