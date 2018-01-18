<?php

namespace App\Http\Controllers;
use App\Leader;
use App\Roles;
use Auth;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        $this->authorize('view',Leader::class);
        $model = new Roles();
        $roles = $model->user_roles()->toArray();
        return view('leader.index',compact('roles'));
    }

    public function edit()
    {
        $this->authorize('edit',Leader::class);
        echo "raf";
    }
}
