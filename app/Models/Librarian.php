<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Librarian extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['username', 'passwrord', 'email'];

    protected $searchableFields = ['*'];
}
