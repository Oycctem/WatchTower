<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GestiondesVehicules;
use Illuminate\Auth\Access\HandlesAuthorization;

class GestiondesVehiculesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GestiondesVehicules $gestiondesVehicules): bool
    {
        return $user->can('view_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GestiondesVehicules $gestiondesVehicules): bool
    {
        return $user->can('update_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GestiondesVehicules $gestiondesVehicules): bool
    {
        return $user->can('delete_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, GestiondesVehicules $gestiondesVehicules): bool
    {
        return $user->can('force_delete_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, GestiondesVehicules $gestiondesVehicules): bool
    {
        return $user->can('restore_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, GestiondesVehicules $gestiondesVehicules): bool
    {
        return $user->can('replicate_gestiondes::vehicules');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_gestiondes::vehicules');
    }
}
