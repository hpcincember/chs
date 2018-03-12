<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
use DB;
class Leader extends Model
{
  
    public function findLeaderFullInfo()
    {
        $sql = "SELECT leaders.*,
                (SELECT name FROM cellgroups WHERE id = cg.mother_cell_group_id) AS mother_cg_name,
                (SELECT name FROM cellgroups WHERE id = cg.network_id) AS network_name,cg.name AS cell_group_name
                     FROM leaders
                     LEFT JOIN cellgroups cg on cg.leader_id = leaders.id
                ORDER by id";
        return DB::select($sql);
    }
}
