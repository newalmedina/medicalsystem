<?php

namespace App\Helpers;

use App\Temporal_File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utils
{

    public static function configInformation()
    {
        return  $setting = [
            "hospital_name" => setting('hospital_name'),
            "schedule" => setting('schedule'),
            "email" => setting('email'),
            "phone_number" => setting('phone_number'),
            "direction" => setting('direction'),
            "logo_photo" => setting('logo_photo'),
        ];
    }

}
