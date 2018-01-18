<?php
namespace App\Helpers;

class Helper
{
    public function checkPermission($operation,$array)
    {
        $array = $array->toArray();
        $roles = array_flatten($array);
        if(in_array($operation,$roles))
        {
            return true;
        }
        return false;
    }
}