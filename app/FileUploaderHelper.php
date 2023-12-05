<?php

namespace App\FileUploaderHelper;
class FileUploaderHelper
{
    public function handle()
    {
        //$imageName = $uploadedFile->getClientOriginalName();
        $path = 'public/images';
        
        try{
           //$uploadedFile->storeAs($path, $imageName);
            //return $imageName;
        }
        catch (Exception $e)
        {
            throw new Exception($e);
        }
    }
}