<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Traits\Upload;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use Upload;

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $this->UploadFile($request->file('file'), 'Products');
            Image::create([
                'path' => $path
            ]);
            return redirect()->route('files.index')->with('success', 'File Uploaded Successfully');
        }
    }
}
