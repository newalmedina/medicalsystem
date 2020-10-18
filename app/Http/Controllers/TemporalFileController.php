<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporal_File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class TemporalFileController extends Controller
{
    public function storeMedia(Request $request)
    {
        $image = $request->file('file');

        // $filename = round(microtime(true)) . $image->getClientOriginalName();
        $extension = $image->getClientOriginalName();
        $filename = round(microtime(true)) . '.' . $extension;
        $image_course = Image::make($image->getRealPath());
        $image_course->save(public_path('temporal_files/' . $filename));
        $file_name = "temporal_files/" . $filename;
        Temporal_File::create([
            "file_directory" => $filename,
            "user_id" => Auth::user()->id]);
        return response()->json([
            'name' => $filename,
            'original_name' => $filename,
        ]);
    }
}
