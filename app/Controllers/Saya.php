<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Saya extends BaseController
{
    public function index()
    {
        //
    }

    public function ica($umur, $desa)
    {
        echo "nama saya ica, umur saya {$umur}, asal rumah {$desa}";
    }
}
