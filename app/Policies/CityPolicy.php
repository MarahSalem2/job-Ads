<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\city;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        //
        // return $user->hasPermissionTo('Read-Cities')
        //     ? $this->allow()
        //     : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, city $city)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        // //
        // return $user->hasPermissionTo('Create-City')
        // ? $this->allow()
        // : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, city $city)
    {
        // //
        // return $user->hasPermissionTo('Update-City')
        // ? $this->allow()
        // : $this->deny();  
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, city $city)
    {
        //
        // return $user->hasPermissionTo('Delete-City')
        // ? $this->allow()
        // : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, city $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, city $city)
    {
        //
    }
}
