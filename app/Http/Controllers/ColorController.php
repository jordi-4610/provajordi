<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Color;

class ColorController extends Controller
{

protected function random_string()
{
    $key = '';
    $keys = array_merge( range('a','z'), range(0,9) );
 
    for($i=0; $i<10; $i++)
    {
        $key .= $keys[array_rand($keys)];
    }
 
    return $key;
}


public function getIndex()
{
    return view('form');
}

public function color(Request $request)
{
  
 
  $imagenOriginal = $request->file('imagen');
 
  $imagen = Image::make($imagenOriginal);
 
  $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
 
  $imagen->resize(300,300);
 
  $imagen->save(public_path().'/img/' . $temp_name, 100);

  $p = new Color;
  $p->filename = $temp_name;
  $p->save();

function fromRGB($R, $G, $B)
{

    $R = dechex($R);
    if (strlen($R)<2)
    $R = '0'.$R;

    $G = dechex($G);
    if (strlen($G)<2)
    $G = '0'.$G;

    $B = dechex($B);
    if (strlen($B)<2)
    $B = '0'.$B;

    return '#' . $R . $G . $B;
}
    $ruta = public_path().'/img/'.$temp_name;
    $i = imagecreatefromjpeg($ruta);
    $rTotal = 0;
    $gTotal = 0;
    $bTotal = 0;
    $total = 0;
    for ($x=0;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i,$x,$y);
            $r   = ($rgb >> 16) & 0xFF;
            $g   = ($rgb >> 8) & 0xFF;
            $b   = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
        }
    }
    $rPromedio = round($rTotal/$total);
    $gPromedio = round($gTotal/$total);
    $bPromedio = round($bTotal/$total);

    $hex = fromRGB($rPromedio,$gPromedio,$bPromedio);
	

    return view('color',['hex' => $hex]);

}

    




}
