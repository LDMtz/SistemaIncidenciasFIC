<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComunController extends Controller
{
    public function create()
    {
        return view('comun.create');
    }
}
