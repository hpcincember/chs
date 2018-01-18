<?php
namespace App;
use Auth;
use Spatie\Permission\Contracts\Role;
use DB;
class Roles
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

}