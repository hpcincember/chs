<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Cellgroup extends Model
{
    CONST STATUS_ACTIVE = 1;
    CONST STATUS_INACTIVE = 0;
    public function findNetworks()
    {
        return DB::table('cellgroups')->where('is_network','=',1)->get();
    }

    public function findCellGroups()
    {
        return DB::table('cellgroups')->get();
    }

    public function findCellLeaderGender($cellgroup)
    { 
        return DB::table('cellgroup as c')
        ->leftJoin('leaders as l','c.leader_id','=','l.id')
        ->select('gender')
        ->get();
    }

    public function findCellGroupInPage()
    {
    	return DB::table('cellgroups as c')
    	->leftJoin('cellgroups as n','c.network_id',"=",'n.id')
    	->leftJoin('cellgroups as mc','c.mother_cell_group_id',"=",'mc.id')
    	->leftJoin('leaders as l','c.leader_id',"=",'l.id')
    	->select('c.id as cellgroup_id','c.name as cellgroup','n.name as network','n.id as network_id','mc.name as mother_cell_group','mc.id as mother_cell_group_id','l.id as leader_id',DB::raw('CONCAT(l.first_name," ",l.middle_name," ",l.last_name) AS full_name'))
    	->paginate(10);
    }

    public function findBelongsToNetwork($network_id)
    {
    	return DB::table('cellgroups as c')
                ->select('l.id','l.first_name','l.last_name')
                ->leftJoin('leaders as l','c.leader_id','=','l.id')
                ->where([
                    ['network_id','=',$network_id],
                    ['status','=',self::STATUS_ACTIVE]
                ])->get();
    }
}
