<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
class Leader extends Model
{
    private $helper;
    private $cellGroup;

    public function __construct()
    {
        $this->helper = new Helper();
        $this->cellGroup = new Cellgroup();
    }

    public function getLevelAttribute($level)
    {
        return $this->helper->getLevel($level);
    }

    public function getGenderAttribute($gender)
    {
        return $this->helper->getGender($gender);
    }

    public function getNetworkAttribute($network)
    {
        $networkName =  CellGroup::find($network);
        return $networkName['name'];
    }

    public function  getFbAccountAttributes($fbAccount)
    {
        return "https://www.facebook.com/".$fbAccount;
    }
}
