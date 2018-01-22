<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Cellgroup extends Model
{
    public function findNetworks()
    {
        return DB::table('cellgroups')->where('is_network','=',1)->get();
    }
}
