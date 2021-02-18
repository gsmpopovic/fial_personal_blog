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
        $siteTitle = "Falling into a Labyrinth | Posts";

        $posts = \Canvas\Models\Post::where('title', 'LIKE', '%'.$query_string.'%')->with('tags', 'topic')->published()->orderByDesc('published_at')->get();

        if (count($posts)>=1) {

            $result = "Here are all the posts that contain the keyword $query_string.";
            return view('blog.displaysearch', ['siteTitle'=>$siteTitle,'posts'=>$posts, 'query_string'=>$query_string, 'result'=>$result]);

            //return view('blog.displaysearch', ['siteTitle'=>$siteTitle,'posts'=>$posts, 'query_string'=>$query_string]);
            //return Redirect::route('sd', compact('posts', 'query_string'));

            
            //return Redirect::route('sd', ['posts', 'query_string'])->with(['posts'=>$posts, 'query_string'=>$query_string]);
        
        } else {
            $posts = [];
            $result = "Whoops! Looks like there aren't any posts that contain the keyword $query_string.";
            return view('blog.displaysearch', ['siteTitle'=>$siteTitle,'posts'=>$posts, 'query_string'=>$query_string, 'result'=>$result]);
            //return Redirect::route('sd', compact('posts', 'query_string', 'error'));

        }
    }
}
