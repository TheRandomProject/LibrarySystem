<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrowed extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'due_date',
        'request',
        'student_id',
        'book_id'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'borrows';

    protected $casts = [
        'due_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
