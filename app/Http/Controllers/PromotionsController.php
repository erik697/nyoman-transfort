<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function index(){
        $promotions = Promotion::orderBy('id','DESC')->get();
        $promotion = Promotion::orderBy('id','DESC')->first();
        $code = "PRN00001";
        if($promotion){
            $code = substr($promotion->code,3);
            $codeInt = (int)$code + 1;
            $codeStr = (string)$codeInt;
            $codeLenght = (-1)*strlen($codeStr);
            if($codeLenght > (-5)){
            $code = substr_replace("DRV00000",$codeStr,$codeLenght);
            }
            else{
                dd("Data Promosi Penuh, Hubungi Admin");
            }
        }
        // dd($code, $driver, $codeLenght);
        return view('promotions.index', compact('code','promotions'));
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
		    $tujuan_upload = 'promotionImage';
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
        Promotion::create($data);
        return redirect()->route('promotions.index');
    }
    public function edit($id){
        
        $promotion = Promotion::find($id);
        return View('promotions.edit', compact('promotion'));
    }
    public function update($id, Request $request){
        // dd($request->all());
        $fileName="";
        $file = $request->image;
        // dd($hapus);
        if($file){
            $file_tmp = $file->getRealPath();
            clearstatcache(TRUE, $file_tmp);
            if (file_exists('promotionImage/'.$request->oldImage)){
                unlink('promotionImage/'.$request->oldImage);

            }
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileExtention = $file->extension();
        $tujuan_upload = 'promotionImage';
        if($fileSize > 5464431){
            dd("File tidak boleh melebih 5mb");
        }
        elseif(!in_array($fileExtention,['jpg','png','jpeg'])){
            dd("file harus berformat jpg,png atau jpeg");
        }
        $file->move($tujuan_upload, $fileName);
    }
        $data = array_merge($request->all(), ['image'=>$fileName]);
        Promotion::find($id)->update($data);
        return redirect()->route('promotions.index');
    }
    public function destroy($id){
        Promotion::where('id',$id)->delete();
        return back();
    }
}
