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
        // $this->authorize('view', Leader::class);
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
            "middle_name" => 'required',
            "last_name" => 'required',
            "gender" => 'required',
            "birth_date" => 'required|date',
            "contact_number" => 'required|max:11',
            "network" => 'required|numeric',
            "cell_group" => 'required|numeric',
            "level" => 'required|numeric',
            "birth_date" => 'required',
            "first_attend" => 'required',
        ]);
        $leader = new Leader();
        $leader->first_name = $request->first_name;
        $leader->middle_name = $request->middle_name;
        $leader->last_name = $request->last_name;
        $leader->gender = $request->gender;
        $leader->school = $request->school;
        $leader->suffix = $request->suffix;
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
        return response()->json([
            'message' => 'Success'
        ], 200); 
    }

    public function leaderData()
    {
        $leader = DB::table('leaders')->get();
        return  response()->json($leader);
    }

    public function leaderPageData()
    {
       
       $leaders = DB::table('leaders')
        ->leftJoin('cellgroups as network','network.id','=','leaders.network')
        ->leftJoin('cellgroups as cg','cg.id' ,'=','leaders.cell_group')
        ->select('leaders.*','network.name as network','cg.name as cell_group')
        ->paginate(10);
        return $leaders;

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
            "middle_name" => 'required',
            "last_name" => 'required',
            "gender" => 'required',
            "birth_date" => 'required|date',
            "contact_number" => 'required|max:11',
            "network" => 'required|numeric',
            "cell_group" => 'required|numeric',
            "level" => 'required|numeric',
            "birth_date" => 'required',
            "first_attend" => 'required',
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
        return response()->json([
            'message' => 'Success'
        ], 200); 

    }

    public function delete(Leader $leader)
    {
        $leader->delete();
         return response()->json([
            'message' => 'Success'
        ], 200); 

    }

    public function show(Leader $leader) 
    {
        $leader = DB::table('leaders')->where('id','=',$leader->id)->get();
        return $leader;
    }
}
