<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagesCrontroller extends Controller
{
    public function index(){
        $packages = Package::orderBy('id','DESC')->get();
        $package = Package::orderBy('id','DESC')->first();
        $code = "PKG00001";
        if($package){
            $code = substr($package->code,3);
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
        // dd($code, $package, $codeLenght);
        return view('packages.index', compact('code','packages'));
    }
    public function store(Request $request){
        // dd($request->all());
        Package::create($request->all());
        return redirect()->route('packages.index');
    }
    public function edit($id){
        $package = Package::find($id);
        return View('packages.edit', compact('package'));
    }
    public function update($id, Request $request){
        // dd($request->all());
        $package = Package::find($id);
      
        $package->update($request->all());
        return redirect()->route('packages.index');
    }
    public function destroy($id){
       $package = Package::where('id',$id)->first();
       $package->delete();
        return back();
    }
}
