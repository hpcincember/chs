<?php
namespace App\Helpers;
trait DataViewer {

	public static function sccopeSearchPaginationAndOrder($query)
	{
		return $query->paginate(10);
	}

}