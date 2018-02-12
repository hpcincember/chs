<?php

namespace App\Http\Controllers;

use App\Cellgroup;
use App\Helpers\Helper;
use App\Leader;
use Auth;
use DataTable;
use DB;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        $this->authorize('view', Leader::class);
        return view('leader.index', compact('modules'));
    }

    public function create()
    {
        $network = new Cellgroup();
        $genders = Helper::getAllGender();
        $levels = Helper::getAllLevels();
        $networks = $network->findNetworks();
        return view('leader.create', compact('genders', 'networks', 'levels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "first_name" => 'required',
            'middle_name'=>'exists:leaders',
            "last_name" => 'required',
            "gender" => 'required',
            "birth_date" => 'required|date',
            "contact_number" => 'required|max:11',
            "network" => 'required|numeric',
            "level" => 'required|numeric',
        ]);
        $leader = new Leader();
        $leader->first_name = $request->first_name;
        $leader->middle_name = $request->middle_name;
        $leader->last_name = $request->last_name;
        $leader->gender = $request->gender;
        $leader->school = $request->school;
        $leader->work_place = $request->work_place;
        $leader->contact_number = $request->contact_number;
        $leader->fb_account  = $request->fb_account;
        $leader->email_address = $request->email_address;
        $leader->level = $request->level;
        $leader->network = $request->network;
        $leader->cell_group = $request->cell_group;
        $leader->birth_date = $request->birth_date;
        $leader->first_attend = $request->first_attend;
        $leader->save();
        return redirect()->route('leaders');
    }

    public function leaderData()
    {
        // $leader = Leader::all();
        // return \DataTables::of($leader)
        //     ->addColumn('action', function ($leader) {
        //         $deleteButton = ' <form action="leader/'.$leader->id.'" method="POST">
        //                             <input type="hidden" name="_method" value="delete">
        //                             <input type="hidden" name="_token" value="'.csrf_token().'">
        //                             <input type="submit" class="btn btn-sm btn-danger" value="Delete">
        //                             </form>';
        //         return '<a href="leader/edit/' . $leader->id . '" class="btn btn-sm btn-primary">Edit</a>'.$deleteButton;
        //     })
        //     ->make(true);
        return DB::table('leaders')->get();
    }

    public function edit(Leader $leader)
    {
        $this->authorize('edit', Leader::class);
        $network = new Cellgroup();
        $genders = Helper::getAllGender();
        $levels = Helper::getAllLevels();
        $networks = $network->findNetworks();
        return view('leader.edit', compact('leader', 'genders', 'networks', 'levels'));
    }

    public function update(Leader $leader, Request $request)
    {
        $this->validate($request, [
            "first_name" => 'required',
            'middle_name'=>'exist:leader',
            "last_name" => 'required',
            "gender" => 'required',
            "birth_date" => 'required|date',
            "contact_number" => 'required|max:11',
            "network" => 'required|numeric',
            "level" => 'required|numeric',
        ]);

        $leader->first_name = $request->first_name;
        $leader->middle_name = $request->middle_name;
        $leader->last_name = $request->last_name;
        $leader->gender = $request->gender;
        $leader->school = $request->school;
        $leader->work_place = $request->work_place;
        $leader->contact_number = $request->contact_number;
        $leader->fb_account  = $request->fb_account;
        $leader->email_address = $request->email_address;
        $leader->level = $request->level;
        $leader->network = $request->network;
        $leader->cell_group = $request->cell_group;
        $leader->birth_date = $request->birth_date;
        $leader->first_attend = $request->first_attend;
        $leader->save();
        return redirect()->route('leader');

    }

    public function delete(Leader $leader)
    {
        $leader->delete();
        return redirect()->route('leader');
    }
}
