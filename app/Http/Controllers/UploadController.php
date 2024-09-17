<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function upload_image(Request $request)
    {
        if (!File::exists(storage_path('app/public/media'))) {
            File::makeDirectory(storage_path('app/public/media'));
        }

        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media/', $filename);
        return $filename;
    }
}
