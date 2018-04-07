<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;
class AttendanceController extends Controller
{
    public function getSundays()
    {
    	$attendance = new Attendance;
    	$mondays = $attendance->getSundaysByMonth();

    	$tomondays = [];

    	foreach ($mondays as $monday)
		{
			$tomondays[] = $monday;
		}

    	return $tomondays;
    }

    public function index()
    {
    	return view('attendance.index');
    }

    public function getLeaderAttendance()
    {
    	$attendance = new Attendance;
    	return $attendance->getAttendance();
    }
}
	