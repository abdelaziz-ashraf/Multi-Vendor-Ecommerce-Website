<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageHandler
{
    public function uploadImage($request, $inputName, $path, $oldImage = null) {
        if($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newName);
            $this->deleteImageIfExists($oldImage);
            return ($path . '/' . $newName);
        }
        return null;
    }

    public function deleteImageIfExists($image) {
        if($image && File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
