<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index(){
        $cars = Cars::orderBy('id','DESC')->get();
        $car = Cars::orderBy('id','DESC')->first();
        $code = "CAR00001";
        if($car){
            $code = substr($car->code,3);
            $codeInt = (int)$code + 1;
            $codeStr = (string)$codeInt;
            $codeLenght = (-1)*strlen($codeStr);
            if($codeLenght > (-5)){
            $code = substr_replace("DRV00000",$codeStr,$codeLenght);
            }
            else{
                dd("Data Driver Penuh, Hubungi Admin");
            }
        }
        // dd($code, $driver, $codeLenght);
        return view('cars.index', compact('code','cars'));
    }
    public function store(Request $request){
        // dd($request->all(), $request->image->getClientOriginalName());
             // isi dengan nama folder tempat kemana file diupload
             $fileName="";
            $file = $request->image;
             if($file){
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileExtention = $file->extension();
		    $tujuan_upload = 'carImage';
            if($fileSize > 5464431){
                dd("File tidak boleh melebih 5mb");
            }
            elseif(!in_array($fileExtention,['jpg','png','jpeg'])){
                dd("file harus berformat jpg,png atau jpeg");
            }
            // dd($file, $fileName, $fileSize, $fileExtention);
 
        // upload file
        $file->move($tujuan_upload, $fileName);
             }
        $data = array_merge($request->all(), ['image'=>$fileName]);
        Cars::create($data);
        return redirect()->route('cars.index');
    }
    public function edit($id){
        
        $car = Cars::find($id);
        return View('cars.edit', compact('car'));
    }
    public function update($id, Request $request){
        // dd($request->all());
        $fileName="";
        $file = $request->image;
        // dd($hapus);
        if($file){
        
            unlink('carImage/'.$request->oldImage);
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileExtention = $file->extension();
        $tujuan_upload = 'carImage';
        if($fileSize > 5464431){
            dd("File tidak boleh melebih 5mb");
        }
        elseif(!in_array($fileExtention,['jpg','png','jpeg'])){
            dd("file harus berformat jpg,png atau jpeg");
        }
        $file->move($tujuan_upload, $fileName);
    }
        $data = array_merge($request->all(), ['image'=>$fileName]);
        Cars::find($id)->update($data);
        return redirect()->route('cars.index');
    }

    public function destroy($id){
        Cars::where('id',$id)->delete();
        return back();
    }
}
