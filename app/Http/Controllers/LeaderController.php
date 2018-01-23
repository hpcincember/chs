<?php

namespace App\Http\Controllers;
use App\Cellgroup;
use App\Helpers\Helper;
use App\Leader;
use App\Module;
use App\Role;
use Auth;
use DataTable;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        $this->authorize('view',Leader::class);
        return view('leader.index',compact('modules'));
    }

    public function leaderData()
    {
        $leader = Leader::all();
        return \DataTables::of($leader)
            ->addColumn('action', function ($leader) {
                return '<a href="leader/edit/' . $leader->id . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    public function edit(Leader $leader)
    {
//        dd($leader);
        $this->authorize('edit',Leader::class);
        $network = new Cellgroup();
        $genders = Helper::getAllGender();
        $levels = Helper::getAllLevels();
        $networks = $network->findNetworks();
        return view('leader.edit',compact('leader','genders','networks','levels'));
    }

    public function update(Leader $leader,Request $request)
    {
        dd($request->request);

    }
}
