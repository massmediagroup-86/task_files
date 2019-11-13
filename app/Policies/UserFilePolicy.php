<?php

namespace App\Policies;

use App\User;
use App\UserFile;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any user files.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the user file.
     *
     * @param \App\User $user
     * @param \App\UserFile $userFile
     * @return bool
     */
    public function view(User $user, UserFile $userFile): bool
    {
        return $user->id === $userFile->user_id;
    }

    /**
     * Determine whether the user can create user files.
     *
     * @param \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the user file.
     *
     * @param \App\User $user
     * @param \App\UserFile $userFile
     * @return bool
     */
    public function update(User $user, UserFile $userFile): bool
    {
        return $user->id == $userFile->user_id;
    }

    /**
     * Determine whether the user can delete the user file.
     *
     * @param \App\User $user
     * @param \App\UserFile $userFile
     * @return bool
     */
    public function delete(User $user, UserFile $userFile): bool
    {
        return $user->id === $userFile->user_id;
    }

    /**
     * Determine whether the user can restore the user file.
     *
     * @param \App\User $user
     * @param \App\UserFile $userFile
     * @return bool
     */
    public function restore(User $user, UserFile $userFile): bool
    {
        return $user->id === $userFile->user_id;
    }

    /**
     * Determine whether the user can permanently delete the user file.
     *
     * @param \App\User $user
     * @param \App\UserFile $userFile
     * @return bool
     */
    public function forceDelete(User $user, UserFile $userFile): bool
    {
        return $user->id === $userFile->user_id;
    }
}
