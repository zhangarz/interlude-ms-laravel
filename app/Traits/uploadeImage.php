<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait uploadeImage{
    public function upload($file,$folder)
    {
        $file_name = $file->getClientOriginalName();
        $full_path = public_path('/uploads/'.$folder);
        $file->move($full_path,$file_name);
        return $file_name;
    }
}