<?php
namespace App\Http\Controllers;
use App\Models\fotoModel;
use Illuminate\Http\Request;

class fotoController extends Controller
{
    public function foto(){
        $foto = $this->listele();
        return view('foto', ['foto' => $foto]);
    }

    public function listele($offset = null, $limit = null){
        $foto = fotoModel::select();
        if(!empty($offset)) $foto->offset($offset);
        if(!empty($limit)) $foto->limit($limit);
        return $foto->get();
    }

    public function fotoEkle($fotoid = 0){
        $foto = [];
        if($fotoid != 0) $foto = fotoModel::find($fotoid);
        return view('fotoEkle', ['foto' => $foto]);
    }

    public function fotoEklendi(Request $request){
        $fotoName = $request->fotoName;
        if($request->foto != "undefined") {
            $fotoName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('assets/images/posts/'), $fotoName);
        }
        $save = fotoModel::updateOrCreate(
            ["fotoid" => $request->fotoid],
            [
                "foto" => $fotoName,
                "aciklama" => $request->aciklama,
            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }
    public function fotoSil(Request $request){
        if(fotoModel::find($request->fotoid)->delete()) {
            return ["islemDurum" => 1];
        }
        else {
            return ["islemDurum" => 0];
        }

    }

}
