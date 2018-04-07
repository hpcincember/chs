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

}
