<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ModuleController extends Controller
{
    public function moduleData()
    {
    	return DB::table('modules')->get();
    }
}
