<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function accounts(){
        return $this->hasMany(Account::class, 'cat_id');
    }

    public function notes(){
        return $this->hasMany(Note::class, 'cat_id');
    }

    public function sites(){
        return $this->hasMany(Site::class, 'cat_id');
    }
}
