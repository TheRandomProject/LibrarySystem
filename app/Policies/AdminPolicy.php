<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function viewAny(Student $student)
    {
        return $student->hasPermissionTo('list admins');
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function view(Student $student, Admin $model)
    {
        return $student->hasPermissionTo('view admins');
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function create(Student $student)
    {
        return $student->hasPermissionTo('create admins');
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function update(Student $student, Admin $model)
    {
        return $student->hasPermissionTo('update admins');
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function delete(Student $student, Admin $model)
    {
        return $student->hasPermissionTo('delete admins');
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function restore(Student $student, Admin $model)
    {
        return false;
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function forceDelete(Student $student, Admin $model)
    {
        return false;
    }
}
