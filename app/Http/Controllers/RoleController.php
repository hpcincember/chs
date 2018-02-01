<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('view',Role::class);
        return view('role.index');
       
    }

    public function rolesData()
    {
        $this->authorize('view',Role::class);
        $model = new Role();
        $roles = $model->getRoles()->paginate(10);
        return $roles;
    }
}
