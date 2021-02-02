<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
public function index($posts, $query_string){

    return view('test', compact($posts, $query_string));

}
}
