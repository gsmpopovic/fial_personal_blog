<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
public function index(Request $request){

    $body = $request->getContent();
    echo($body);
    //return view('blog.displaysearch', compact());

}
}
