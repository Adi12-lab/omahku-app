<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function viewInAdmin(User $user): bool
    {
        $condition = $user->isAdmin() || ($user->isAgent() && $user->agent);
        return  $condition;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAgent() && $user->agent;
    }

    public function edit(User $user, $property): bool
    {
        return $user->isAgent() && $property->agent_id === $user->agent->id;;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Property $property): bool
    {
        return $user->isAgent() && $property->agent_id === $user->agent->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, Property $property): bool
    {
        return  $user->isAdmin() || ($user->isAgent() && $property->agent_id === $user->agent->id );
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Property $property): bool
    // {
    //     return $user->isAdmin();
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Property $property): bool
    // {
    //     return $user->isAdmin();
    // }
}
