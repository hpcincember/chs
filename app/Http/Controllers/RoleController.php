<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('view',Role::class);
        $model = new Role();
        $collection = $model->getRoles();
        $modules = $collection->groupBy('module');
        return view('role.index',compact('modules'));
    }
}
