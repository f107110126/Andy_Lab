<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
// generate by command:
// php artisan make:policy -m Conversation ConversationPolicy

class ConversationPolicy
{
    use HandlesAuthorization;

    public function before(User $user) {
        // $user->isAdmin() $user->roles() $user->id
        // this point is "if is admin, whatever just pass;
        // also point to "if not admin, whatever just false;
        // return $user->id === 6; // 

        // this is said "if is admin, whatever just pass;
        // if not admin do the after...
        // return true or false will stop authorize
        // only return null will do next
        if ($user->id === 6) {
            return true;
        }
    }

    public function after(User $user) {
        // return $user->id === 6;
        // here could do other process;
    }

    /**
     * Determine whether the user can view any conversations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function view(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }

    /**
     * Determine whether the user can create conversations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
        // cause this code, comment the code in AuthServiceProvider
    }

    /**
     * Determine whether the user can delete the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function delete(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can restore the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function restore(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function forceDelete(User $user, Conversation $conversation)
    {
        //
    }
}
