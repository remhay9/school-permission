<?php

namespace App\Policies;

use App\Models\PermissionRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermissionRequestPolicy
{
     public function approve(User $user, PermissionRequest $request)
    {
        return $user->hasAnyRole(['Admin','Teacher']);
    }
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    // public function view(User $user, PermissionRequest $permissionRequest): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can create models.
    //  */
    // public function create(User $user): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    // public function update(User $user, PermissionRequest $permissionRequest): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    // public function delete(User $user, PermissionRequest $permissionRequest): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, PermissionRequest $permissionRequest): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, PermissionRequest $permissionRequest): bool
    // {
    //     return false;
    // }
   

}
