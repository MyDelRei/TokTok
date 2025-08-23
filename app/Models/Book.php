<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';
    protected $fillable = ['title','isbn','category_id','description','author_id','published_year','available_stock'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id','author_id');
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }


    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class, 'book_id');
    }
}

