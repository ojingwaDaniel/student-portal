<?php

namespace App\Policies;

use App\Models\User;

class MaterialPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function uploadMaterials(User $user)
    {
        return in_array($user->role, ['lecturer', 'admin']);
    }
}
