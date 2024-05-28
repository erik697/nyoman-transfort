<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Drivers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DriversController extends Controller
{
    public function index(){
        $drivers = Drivers::orderBy('id','DESC')->get();
        $driver = Drivers::orderBy('id','DESC')->first();
        $code = "DRV00001";
        if($driver){
            $code = substr($driver->code,3);
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
        return view('drivers.index', compact('code','drivers'));
    }
    public function store(Request $request){
        // dd($request->all());
        Drivers::create($request->all());
        return redirect()->route('drivers.index');
    }
    public function edit($id){
        $driver = Drivers::find($id);
        $car_select = $driver->cars->pluck('id')->toArray();
        // dd($car_select);
        $cars = Cars::get();
        return View('drivers.edit', compact('driver','cars','car_select'));
    }
    public function update($id, Request $request){
        // dd($request->all());
        $driver = Drivers::find($id);
      
        $driver->cars()->sync($request->cars);
        $driver->update($request->all());
        return redirect()->route('drivers.index');
    }
    public function destroy($id){
       $driver = Drivers::where('id',$id)->first();
       $driver->cars()->delete();
       $driver->delete();
        return back();
    }
}
