<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\Borrowed;
use Illuminate\Auth\Access\HandlesAuthorization;

class BorrowedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the borrowed can view any models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function viewAny(Student $student)
    {
        return $student->hasPermissionTo('list borrows');
    }

    /**
     * Determine whether the borrowed can view the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Borrowed  $model
     * @return mixed
     */
    public function view(Student $student, Borrowed $model)
    {
        return $student->hasPermissionTo('view borrows');
    }

    /**
     * Determine whether the borrowed can create models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function create(Student $student)
    {
        return $student->hasPermissionTo('create borrows');
    }

    /**
     * Determine whether the borrowed can update the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Borrowed  $model
     * @return mixed
     */
    public function update(Student $student, Borrowed $model)
    {
        return $student->hasPermissionTo('update borrows');
    }

    /**
     * Determine whether the borrowed can delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Borrowed  $model
     * @return mixed
     */
    public function delete(Student $student, Borrowed $model)
    {
        return $student->hasPermissionTo('delete borrows');
    }

    /**
     * Determine whether the borrowed can restore the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Borrowed  $model
     * @return mixed
     */
    public function restore(Student $student, Borrowed $model)
    {
        return false;
    }

    /**
     * Determine whether the borrowed can permanently delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Borrowed  $model
     * @return mixed
     */
    public function forceDelete(Student $student, Borrowed $model)
    {
        return false;
    }
}
