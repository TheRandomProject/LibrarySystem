<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Librarian extends Authenticatable
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['username', 'passwrord', 'email'];

    protected $searchableFields = ['*'];
}
