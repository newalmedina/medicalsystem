<?php

namespace App\Helpers;

use App\Temporal_File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utils
{

    public static function example()
    {
        return 'example';
    }
    public static function deleteTemporalFile(){
        $temporalFiles= Temporal_File::where("user_id",Auth::user()->id)->get();
        foreach ($temporalFiles as $file) {
            if(file_exists("temporal_files/".$file->file_directory)){
                unlink("temporal_files/".$file->file_directory);
            }
        }
        return Temporal_File::where("user_id",Auth::user()->id)->delete();
        
    }
}
