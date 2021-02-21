<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasFactory;
    use Searchable;

    protected $fillable = ['firstname', 'lastname', 'contact', 'username', 'email', 'password', 'image'];

    protected $searchableFields = ['*'];

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function borrows()
    {
        return $this->hasMany(Borrowed::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
