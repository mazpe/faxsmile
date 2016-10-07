<?php

namespace App\Policies;

use App\User;
use App\Provider;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the provider.
     *
     * @param  App\User  $user
     * @param  App\Provider  $provider
     * @return mixed
     */
    public function view(User $user, Provider $provider)
    {
        //
    }

    /**
     * Determine whether the user can create providers.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the provider.
     *
     * @param  App\User  $user
     * @param  App\Provider  $provider
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        //
    }

    /**
     * Determine whether the user can delete the provider.
     *
     * @param  App\User  $user
     * @param  App\Provider  $provider
     * @return mixed
     */
    public function delete(User $user, Provider $provider)
    {
        //
    }
}
