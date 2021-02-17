<?php

namespace App\Http\Controllers;

use Canvas\Models; 

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPosts(Request $request){
        $siteTitle="...";
        $query_string = $request->q; 
        $siteTitle = "Falling into a Labyrinth | $query_string";

        $posts = \Canvas\Models\Post::where('title', 'LIKE', '%'.$query_string.'%')->get();

        if (count($posts)>=1) {

            return view('blog.displaysearch', ['siteTitle'=>$siteTitle,'posts'=>$posts, 'query_string'=>$query_string]);
            // return Redirect::route('sd', compact('posts', 'query_string')); 
            // return Redirect::route('show');
            
            //return Redirect::route('sd', ['posts', 'query_string'])->with(['posts'=>$posts, 'query_string'=>$query_string]);
        
        } else {
            $posts = [];
            $error = "No posts!";
            return Redirect::route('blog');
        }
    }
}
