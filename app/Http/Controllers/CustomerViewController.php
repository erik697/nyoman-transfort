<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\MyMail;
use App\Models\Cars;
use App\Models\Greetings;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerViewController extends Controller
{
    public function index(){
        $cars = Cars::get();
        $promotions = Promotion::get();
        $packages = Package::get();
    $greeting = Greetings::first();
        return view('customerMenu.index',compact('cars','promotions', 'packages', 'greeting'));
    }
    public function booking(Request $request){
        $car = Cars::find($request->id);
        return view('customerMenu.booking', compact('car'));
    }

    public function bookingPickup(Request $request){
        return view('customerMenu.bookingPickup');
    }

    public function bookingStore(Request $request){
        $details = [
            'title' => 'Wait For Payment',
            'body' => 'Thank for booking, Lakukan pembayaran DP ke rekening berikut ATM01010 sebesar $10',
            'email' =>$request->email
            ];
           
        // dispatch(new SendMailJob($details));


        $email = new MyMail($details);
        Mail::to($details['email'])->send($email);
            // dd("Email sudah terkirim.");
            $invoice = Invoice::orderBy('id','DESC')->first();
            $code = "INV00001";
            if($invoice){
                $code = substr($invoice->code,3);
                $codeInt = (int)$code + 1;
                $codeStr = (string)$codeInt;
                $codeLenght = (-1)*strlen($codeStr);
                if($codeLenght > (-5)){
                $code = substr_replace("DRV00000",$codeStr,$codeLenght);
                }
                else{
                    dd("Data Transaksi Penuh, Hubungi Admin");
                }
            }
        Invoice::create(array_merge($request->all(),['code'=>$code]));
        return redirect()->route('customerHome')->with('status', 'Email berhasil dikirim');
    }
}
