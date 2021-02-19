<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'author',
        'quantity',
        'cover_image',
        'published',
        'genre_id',
    ];

    protected $searchableFields = ['*'];

    public function borrows()
    {
        return $this->hasMany(Borrowed::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
