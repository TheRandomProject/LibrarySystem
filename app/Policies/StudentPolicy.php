<?php

namespace App\Policies;

use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the student can view any models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function viewAny(Student $student)
    {
        return $student->hasPermissionTo('list users');
    }

    /**
     * Determine whether the student can view the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Student  $model
     * @return mixed
     */
    public function view(Student $student, Student $model)
    {
        return $student->hasPermissionTo('view users');
    }

    /**
     * Determine whether the student can create models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function create(Student $student)
    {
        return $student->hasPermissionTo('create users');
    }

    /**
     * Determine whether the student can update the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Student  $model
     * @return mixed
     */
    public function update(Student $student, Student $model)
    {
        return $student->hasPermissionTo('update users');
    }

    /**
     * Determine whether the student can delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Student  $model
     * @return mixed
     */
    public function delete(Student $student, Student $model)
    {
        return $student->hasPermissionTo('delete users');
    }

    /**
     * Determine whether the student can restore the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Student  $model
     * @return mixed
     */
    public function restore(Student $student, Student $model)
    {
        return false;
    }

    /**
     * Determine whether the student can permanently delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Student  $model
     * @return mixed
     */
    public function forceDelete(Student $student, Student $model)
    {
        return false;
    }
}
