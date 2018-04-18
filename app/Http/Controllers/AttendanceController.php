<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;
use App\Input;
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

    public function getLeaderAttendancePageData()
    {
        $attendance = new Attendance;
        return $attendance->findAttendanceInPage();
    }

    public function search(Request $request)
    {
        $model = new Attendance;
        $result = $model->findAttendaceByKeyword($request->keywords);


        return $result;
    }

    public function searchByNetwork(Request $request)
    {
        $model = new Attendance;
        $result = $model->findAttendaceByNetwork($request->keywords);


        return response()->json($result);
    }
}
	