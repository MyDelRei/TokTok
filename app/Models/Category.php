<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;


    protected $primaryKey = 'category_id';  // 👈 correct PK
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['category_name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }

    public function getNameAttribute()
    {
        return $this->category_name;
    }
}