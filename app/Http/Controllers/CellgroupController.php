<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cellgroup;
class CellgroupController extends Controller
{
    public function getNetworks()
    {
    	$cellgroup = new Cellgroup;
    	return $cellgroup->findNetworks();
    }

    public function getCellGroups()
    {
    	$cellgroup = new Cellgroup;
    	return $cellgroup->findCellgroups();
    }
}
