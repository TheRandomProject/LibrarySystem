<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\Librarian;
use Illuminate\Auth\Access\HandlesAuthorization;

class LibrarianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the librarian can view any models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function viewAny(Student $student)
    {
        return $student->hasPermissionTo('list librarians');
    }

    /**
     * Determine whether the librarian can view the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Librarian  $model
     * @return mixed
     */
    public function view(Student $student, Librarian $model)
    {
        return $student->hasPermissionTo('view librarians');
    }

    /**
     * Determine whether the librarian can create models.
     *
     * @param  App\Models\Student  $student
     * @return mixed
     */
    public function create(Student $student)
    {
        return $student->hasPermissionTo('create librarians');
    }

    /**
     * Determine whether the librarian can update the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Librarian  $model
     * @return mixed
     */
    public function update(Student $student, Librarian $model)
    {
        return $student->hasPermissionTo('update librarians');
    }

    /**
     * Determine whether the librarian can delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Librarian  $model
     * @return mixed
     */
    public function delete(Student $student, Librarian $model)
    {
        return $student->hasPermissionTo('delete librarians');
    }

    /**
     * Determine whether the librarian can restore the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Librarian  $model
     * @return mixed
     */
    public function restore(Student $student, Librarian $model)
    {
        return false;
    }

    /**
     * Determine whether the librarian can permanently delete the model.
     *
     * @param  App\Models\Student  $student
     * @param  App\Models\Librarian  $model
     * @return mixed
     */
    public function forceDelete(Student $student, Librarian $model)
    {
        return false;
    }
}
