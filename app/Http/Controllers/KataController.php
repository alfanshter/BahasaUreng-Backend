<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KataController extends Controller
{
    public function index()
    {
        return view('kata.kata');
    }
}
