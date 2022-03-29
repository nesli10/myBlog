<?php

namespace App\Http\Controllers;
use App\Models\biyografiModel;
use Illuminate\Http\Request;

class biyografiController extends Controller
{
    public function biyografiEkle(){
        $biyografi = $this->listele();
        return view('biyografiEkle', ['biyografi' => $biyografi]);
    }

    public function listele(){
        return biyografiModel::select()->first();
    }
    public function biyografiEklendi(Request $request){

        $fotoName = $request->fotoName;
        if($request->foto != "undefined") {
            $fotoName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('assets/images/faces/'), $fotoName);
        }
        $save = biyografiModel::updateOrCreate(
            ["biyografiid" => $request->biyografiid],
            [
                "isim" => $request->isim,
                "aciklama" => $request->aciklama,
                "foto" => $fotoName
            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }

}
