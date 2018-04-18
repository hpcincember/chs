<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;

class Attendance extends Model
{
	public function getSundaysByMonth()
	{
	    return new \DatePeriod(
	        Carbon::parse("first sunday of this month"),
	        CarbonInterval::week(),
	        Carbon::parse("first sunday of next month")
	    );
	}

	public function getSundaysByYear()
	{
	    return new \DatePeriod(
	        Carbon::parse("first sunday of january this year"),
	        CarbonInterval::week(),
	        Carbon::parse("first  sunday of january next year -1 sunday")
	    );
	}

	public function getAttendance()
	{	
		return DB::table('leaders as l')
		->select('l.first_name','l.last_name',DB::raw('group_concat(attendance_date) as attendance'))
		->leftJoin('attendances as a','l.id','=','a.leader_id')
		->groupBy('l.id','l.first_name','l.last_name')
		->get();


	}

	public function findAttendanceInPage()
	{	
		return DB::table('leaders as l')
		->select('l.first_name','l.last_name',DB::raw('group_concat(attendance_date) as attendance'))
		->leftJoin('attendances as a','l.id','=','a.leader_id')
		->groupBy('l.id','l.first_name','l.last_name')
		->paginate(15);
	}

	public function findAttendaceByKeyword($keywords)
	{
		return DB::table('leaders as l')
		->select('nw.name','l.first_name','l.last_name',DB::raw('group_concat(attendance_date) as attendance'))
		->leftJoin('attendances as a','l.id','=','a.leader_id')
	    ->leftJoin('cellgroups as nw','l.network','=','nw.id')
	    ->where('l.first_name', 'like', '%' . $keywords . '%')
	    ->orWhere('l.last_name', 'like', '%' . $keywords . '%')
		->groupBy('l.id','l.first_name','l.last_name','name')
		->paginate(15);
	}

	public function findAttendaceByNetwork($network_id)
	{
		return DB::table('leaders as l')
		->select('l.first_name','l.last_name',DB::raw('group_concat(attendance_date) as attendance'))
		->leftJoin('attendances as a','l.id','=','a.leader_id')
		->leftJoin('cellgroups as cg','l.id','=','cg.leader_id')
	    ->where('cg.network_id', '=', $network_id)
		->groupBy('l.id','l.first_name','l.last_name')
		->get();
	}

}
