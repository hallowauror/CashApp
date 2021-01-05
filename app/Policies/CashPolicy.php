<?php

namespace App\Policies;

use App\Models\{User, Cash};
use Illuminate\Auth\Access\HandlesAuthorization;

class CashPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
   
    public function show(User $user, Cash $cash)
    {
        return $user->id === $cash->user_id;
    }
}
