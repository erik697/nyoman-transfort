<?php

namespace App\Http\Controllers;

use App\Models\Greetings;
use Illuminate\Http\Request;

class greetingsCrontroller extends Controller
{
    // public function index(){
    //     $greetings = Greetings::orderBy('id','DESC')->get();
    //     // dd($code, $greeting, $codeLenght);
    //     return view('Greetings.index', compact('greetings'));
    // }
    public function edit(){
        $greeting = Greetings::first();
        return View('greetings.edit', compact('greeting'));
    }
    public function update($id, Request $request){

        // dd($request->all());
        
       $this->validate($request, [

        'description' => 'required'

   ]);


  $description = $request->description;
        $dom = new \DomDocument();
        // dd($description);
        libxml_use_internal_errors(true);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | libxml_use_internal_errors(true));    
 
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $k => $img){
 
 
            $data = $img->getAttribute('src');
            if (strpos($data, ';') === false) {
                continue;
            }
//  dd($data);
            list($type, $data) = explode(';', $data);
 
            list(, $data)      = explode(',', $data);
 
            $data = base64_decode($data);
 
            $image_name= "/greetingImage/" . time().$k.'.png';
 
            $path = public_path() . $image_name;
 
            file_put_contents($path, $data);
 
            $img->removeAttribute('src');
 
            $img->setAttribute('src', $image_name);
 
         }
 
 
        $description = $dom->saveHTML();
 
        // dd($request->all());
        
        $greeting = Greetings::find($id);
        $greeting->update(['description'=>$description]);
        return redirect()->route('greetings.edit');
    }
}
