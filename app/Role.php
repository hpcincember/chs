<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
Use DB;
class Role extends Model
{
    private $user_id;
    public function __construct()
    {
        $this->user_id = Auth::user()->id;
    }
    public function user_roles()
    {
        return DB::table('roles')->get(['operation'])->map(function ($item) {
            return collect($item)->values();
        });
    }

    public function getRoles()
    {
        return DB::table('roles')
            ->leftJoin('modules','modules.id','=','roles.module_id')
            ->select('roles.user_id','roles.id','modules.name as module','roles.operation');
    }

     public function getRoleById($id)
    {
        return DB::table('roles')
            ->leftJoin('modules','modules.id','=','roles.module_id')
            ->where('roles.id','=',$id)
            ->select('roles.user_id','roles.id','modules.name as module','roles.operation')
            ->get();
    }

}
