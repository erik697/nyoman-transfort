<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardsController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
}