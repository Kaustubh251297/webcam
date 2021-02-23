<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class uploadController extends Controller
{
    //
    function upload(){
        $img = $_POST['image'];
        //echo $photo;
        $folderPath = public_path('image/snap.png');

        // $image_parts = explode(";base64,", $img);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];

        // $image_base64 = base64_decode($image_parts[1]);
        // $fileName = uniqid() . '.png';

        // $file = $folderPath . $fileName;
        // file_put_contents($file, $image_base64);

        // print_r($fileName);
        // define($folderPath, 'uploads/');
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
//$file = $folderPath . uniqid() . '.png';
echo $data;
//Storage::disk('local')->put(uniqid() . '.png', $data);
$success = file_put_contents($folderPath, $data);
print $success ? $folderPath : 'Unable to save the file.';
    }
}
