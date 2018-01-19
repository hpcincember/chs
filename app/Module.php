<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function getModules()
    {
        return self::All();
    }
}
