<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{    
    public function index(){
        
        $siteTitle='Falling into a Labyrinth | Home';

        return view('index', compact('siteTitle'));

        // return view('index')->with(['siteTitle'=>'Falling into a Labyrinth | Home']);

    }

    public function about(){

        $siteTitle='Falling into a Labyrinth | About';

        return view('about', compact('siteTitle'));
        
        // return view('about')->with(['siteTitle'=>'Falling into a Labyrinth | About']);

    }

    public function contact(){

        $siteTitle='Falling into a Labyrinth | Contact';

        return view('contact', compact('siteTitle'));
        
        // return view('contact')->with(['siteTitle'=>'Falling into a Labyrinth | Contact']);

    }
}
