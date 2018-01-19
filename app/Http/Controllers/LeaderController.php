<?php

namespace App\Http\Controllers;
use App\Leader;
use App\Module;
use App\Role;
use Auth;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {

        $this->authorize('view',Leader::class);
        $model = new Role();
        $collection = $model->getRoles();
        $modules = $collection->groupBy('module');

        return view('leader.index',compact('modules'));
    }

    public function edit()
    {
        $this->authorize('edit',Leader::class);
        echo "raf";
    }
}
