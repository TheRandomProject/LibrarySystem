<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the book can view any models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function viewAny(Student $student)
    {
        return $student->hasPermissionTo('list books');
    }

    /**
     * Determine whether the book can view the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Book  $model
     * @return mixed
     */
    public function view(Student $student, Book $model)
    {
        return $student->hasPermissionTo('view books');
    }

    /**
     * Determine whether the book can create models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function create(Student $student)
    {
        return $student->hasPermissionTo('create books');
    }

    /**
     * Determine whether the book can update the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Book  $model
     * @return mixed
     */
    public function update(Student $student, Book $model)
    {
        return $student->hasPermissionTo('update books');
    }

    /**
     * Determine whether the book can delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Book  $model
     * @return mixed
     */
    public function delete(Student $student, Book $model)
    {
        return $student->hasPermissionTo('delete books');
    }

    /**
     * Determine whether the book can restore the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Book  $model
     * @return mixed
     */
    public function restore(Student $student, Book $model)
    {
        return false;
    }

    /**
     * Determine whether the book can permanently delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Book  $model
     * @return mixed
     */
    public function forceDelete(Student $student, Book $model)
    {
        return false;
    }
}
