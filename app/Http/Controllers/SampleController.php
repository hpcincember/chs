<?php

namespace App\Http\Controllers;
use  App\Leader;
use Illuminate\Http\Request;
use DB;
class SampleController extends Controller
{
	public function index()
	{
		return view("sample.index");
	}

	public function getSampleData()
	{
		return Leader::sccopeSearchPaginationAndOrder();
	}
}
