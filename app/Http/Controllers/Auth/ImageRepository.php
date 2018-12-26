<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Image;


class ImageRepository
{

public function saveImage($image, $id, $type, $size)
{
    //verificar se a variável $image enviada é nula
if (!is_null($image))
{
    //extraindo o arquivo e a extensão
$file = $image;
$extension = $image->getClientOriginalExtension();
    //geramos um nome aleatório
$fileName = time() . random_int(100, 999) .'.' . $extension;
    //indicamos o destino do nosso arquivo
    //A variável $type é responsável por dizer a pasta em que vamos colocar a imagem
$destinationPath = public_path('images/'.$type.'/'.$id.'/');
$url = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/'.$id.'/'.$fileName;
$fullPath = $destinationPath.$fileName;
if (!file_exists($destinationPath)) {
File::makeDirectory($destinationPath, 0775);
}
$image = Image::make($file)
->resize($size, null, function ($constraint) {
$constraint->aspectRatio();
})
->encode('jpg');
$image->save($fullPath, 100);
return $url;
} else {
return 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/placeholder300x300.jpg';
}
}
}