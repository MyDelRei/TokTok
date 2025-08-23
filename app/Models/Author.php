<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'author_id';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = ['author_name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }

    public function getNameAttribute()
    {
        return $this->author_name;
    }
}
