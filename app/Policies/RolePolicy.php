<?php

namespace App\Policies;

use App\User;
use App\Role;
use App\Helpers\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    private $roles;
    private $helper;
    public function __construct()
    {
        $this->roles = new Role();
        $this->helper = new Helper();

    }

    public function view()
    {
        return $this->helper->checkPermission("view_role",$this->roles->user_roles());
    }

    public function edit()
    {
        return $this->helper->checkPermission("edit_role",$this->roles->user_roles());
    }
}
