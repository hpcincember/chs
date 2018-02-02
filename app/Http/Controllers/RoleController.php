<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Http\Request;
use Response;
use App\Role;
use DB;
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
        return $roles = $model->getRoles()->paginate(3);
    }
}
