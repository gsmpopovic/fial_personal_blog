<?php

namespace App\Http\Controllers;

use Canvas\Models; 

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPosts(Request $request){

        $query_string = $request->q; 
        $siteTitle = "Falling into a Labyrinth | $query_string";

        $posts = \Canvas\Models\Post::where('title', 'LIKE', '%'.$query_string.'%')->get();

        if (count($posts)>=1) {

            return Redirect::route('sd', compact('posts', 'query_string')); 
            // return Redirect::route('show');

            // return Redirect::route('DisplayController.index, $posts, $query_string')->with(['posts'=>$posts, 'query_string'=>$query_string]);
        } else {
            $posts = [];
            $error = "No posts!";
            return route('dsearch');
        }
    }
}
