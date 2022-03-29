<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class anasayfaController extends Controller

{
    public function anasayfa()
    {
        $biyografi =(new biyografiController)->listele();
        $foto =(new fotoController)->listele(0, 12);
        return view('anasayfa', ['biyografi' => $biyografi,'foto' => $foto]);
    }


}
