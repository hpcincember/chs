<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cellgroup;
use DB;
class CellgroupController extends Controller
{
    public $cellgroup;
    public function __construct()
    {
        $this->cellgroup = new Cellgroup;
    }
    public function getNetworks()
    {
    	return $this->cellgroup->findNetworks();
    }

    public function getCellGroups()
    {
    	return $this->cellgroup->findCellgroups();
    }

    public function getCellGroupsPageData()
    {
    	return $this->cellgroup->findCellGroupInPage();

    }

    public function getBelongsToNetwork($network_id)
    {
        $belongToNetwork = $this->cellgroup->findBelongsToNetwork($network_id);
        if(!$belongToNetwork->isEmpty()) {
            return $belongToNetwork;            
        }
        return $this->cellgroup->findCellgroups();
    }

    public function index()
    {
    	return view('cellgroup.index');
    }

    public function update(Request $request,Cellgroup $cellgroup)
    {
        $this->validate($request,[
            'cellgroup'=>'required',
            'network_id'=>'required',
            'mother_cell_group_id'=>'required',
            'leader_id' =>'required'
        ]);

        $cellgroup->name = $request->cellgroup;
        $cellgroup->leader_id  = $request->leader_id;
        $cellgroup->mother_cell_group_id = $request->mother_cell_group_id;
        $cellgroup->network_id = $request->network_id;
        $cellgroup->is_network = 0;
        $cellgroup->status = 1;
        $cellgroup->save();

        return response()->json([
            'message' => "success"
        ],200);
    }

    public function store(Request $request, Cellgroup $cellgroup){
         $this->validate($request,[
            'cellgroup'=>'required',
            'network_id'=>'required',
            'mother_cell_group_id'=>'required',
            'leader_id' =>'required'
        ]);

        $cellgroup->name = $request->cellgroup;
        $cellgroup->leader_id  = $request->leader_id;
        $cellgroup->mother_cell_group_id = $request->mother_cell_group_id;
        $cellgroup->network_id = $request->network_id;
        $cellgroup->is_network = 0;
        $cellgroup->status = 1;
        $cellgroup->save();
        return response()->json([
            'message' => 'success'
        ],200);
    }

    public function delete(Cellgroup $cellgroup)
    {
        $cellgroup->delete();
         return response()->json([
            'message' => 'Success'
        ], 200); 
    }
}
