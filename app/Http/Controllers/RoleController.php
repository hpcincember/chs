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
        // $this->authorize('view',Role::class);
        return view('role.index');
       
    }

    public function rolesData()
    {
        // $this->authorize('view',Role::class);
        $model = new Role();
        return $roles = $model->getRoles()->paginate(10);
    }

    public function show(Role $role)
    {
        return response()->json([
            'role' => $role
        ]);

    }

    public function store(Request $request)
    {
        $model = new Role;
        $model->alias = $request->role;
        $model->user_id = $request->user_id;
        $model->module_id = $request->module_id;
        $model->operation = $request->role;
        $role =  $model->save();
        return response()->json([
            'role'    => $role,
            'message' => 'Success'
        ], 200);
    }
}
