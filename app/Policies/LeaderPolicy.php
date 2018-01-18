<?php

namespace App\Policies;

use App\User;
use App\Roles;
use App\Helpers\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaderPolicy
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
        $this->roles = new Roles();
        $this->helper = new Helper();

    }

    public function view()
    {
        return $this->helper->checkPermission("view_leader",$this->roles->user_roles());
    }

    public function edit()
    {
        return $this->helper->checkPermission("edit_leader",$this->roles->user_roles());
    }
}
