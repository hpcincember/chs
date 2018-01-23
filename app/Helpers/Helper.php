<?php
namespace App\Helpers;

class Helper
{
    const MALE = 1;
    const FEMALE = 0;
    const PASTOR = 0;
    const PRIMARY = 1;
    const ONE_FOUR_FOUR = 2;
    const ONE_SEVEN_TWO_EIGHT = 3;
    const TWENTY_THOUSAND = 4;

    public static function getAllGender()
    {
        return [self::FEMALE => 'Female', self::MALE => 'Male'];
    }

    public static function getAllLevels()
    {
        return [
            self::PASTOR => "Pastor/Pastor's Wife",
            self::PRIMARY => "Primary Leaders",
            self::ONE_FOUR_FOUR => "144 Leaders",
            self::ONE_SEVEN_TWO_EIGHT => "1728 Leaders",
            self::TWENTY_THOUSAND => "20,000 Leaders"
        ];
    }

    public function checkPermission($operation, $array)
    {
        $array = $array->toArray();
        $roles = array_flatten($array);
        if (in_array($operation, $roles)) {
            return true;
        }
        return false;
    }

    public function getGender($gender)
    {
        return ($gender == self::MALE) ? "Male" : "Female";
    }

    public function getLevel($level)
    {
        $displayLevel = "";
        switch ($level) {
            case 0:
                $displayLevel = "Pastor/Pastor's Wife";
                break;
            case 1;
                $displayLevel = "Primary Leaders";
                break;
            case 2;
                $displayLevel = "144 Leaders";
                break;
            case 3;
                $displayLevel = "1728 Leaders";
                break;
            case 4;
                $displayLevel = "20,000 Leaders";
                break;
            default:
                $displayLevel = "Invalid Level";
        }
        return $displayLevel;

    }


}