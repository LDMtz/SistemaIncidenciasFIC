<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
     public function admin_index(){
         return view('admin.areas.index');
     }
}
