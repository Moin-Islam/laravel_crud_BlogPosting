<?php

if (!function_exists("ImageUploader")) {
    function ImageUploader($image)
    {
        //$imageName = $uploadedFile->getClientOriginalName();
        $path = 'public/images';
        $filename = $image->getClientOriginalName();
        $image->storeAs($path, $filename);
        return $filename;
    }
}

if(!function_exists("UpdateImage"))
{
    function UpdateImage($image, $previousImage)
    {

        $path = 'public/images';
        $filename = $image->getClientOriginalName();
        if(Storage::url($previousImage))
        {
            Storage::delete($previousImage);
        }
        $image->storeAs($path, $filename);
        return $filename;
    }
}
