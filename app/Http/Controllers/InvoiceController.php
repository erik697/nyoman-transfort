<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\Drivers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::orderByRaw('FIELD(status, "pending", "success", "reject")')
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('invoice.index',compact('invoices'));
    }

    public function edit($id){
        $invoice = Invoice::where('id',$id)->first();
        $drivers = Drivers::get();
        return view('invoice.edit', compact('invoice','drivers'));
    }

    public function update(Request $request, $id){
        Invoice::where('id',$id)
        ->update([
            'driver_id' => $request->driver_id,
            'status' => $request->status
        ]);

        if($request->status == "success"){
            $tlt = 'Your booking success';
            $msg ='thank for your payment, we waiting for your attention';
        }
        else{
            $tlt = 'Your booking reject';
            $msg ='sorry because we dont have down payment we cancel yor booking';
        }

        $details = [
            'title' => $tlt,
            'body' => $msg,
            'email' =>$request->email
            ];
           
        // dispatch(new SendMailJob($details));


        $email = new MyMail($details);
        Mail::to($details['email'])->send($email);

        return redirect()->route('invoices.index');
    }
}
