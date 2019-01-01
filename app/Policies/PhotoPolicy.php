<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Photo;
class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Определяем, может ли данный пользователь удалить данную задачу.
     *
     * @param  User  $user
     * @param  Photo  $photo
     * @return bool
     */
    public function destroy(User $user, Photo $photo)
    {
        return $user->id === $photo->user_id;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
