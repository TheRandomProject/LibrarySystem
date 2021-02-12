<?php

namespace App\Policies;

use App\Models\Genre;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the genre can view any models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function viewAny(Student $student)
    {
        return $student->hasPermissionTo('list genres');
    }

    /**
     * Determine whether the genre can view the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function view(Student $student, Genre $model)
    {
        return $student->hasPermissionTo('view genres');
    }

    /**
     * Determine whether the genre can create models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function create(Student $student)
    {
        return $student->hasPermissionTo('create genres');
    }

    /**
     * Determine whether the genre can update the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function update(Student $student, Genre $model)
    {
        return $student->hasPermissionTo('update genres');
    }

    /**
     * Determine whether the genre can delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function delete(Student $student, Genre $model)
    {
        return $student->hasPermissionTo('delete genres');
    }

    /**
     * Determine whether the genre can restore the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function restore(Student $student, Genre $model)
    {
        return false;
    }

    /**
     * Determine whether the genre can permanently delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function forceDelete(Student $student, Genre $model)
    {
        return false;
    }
}
