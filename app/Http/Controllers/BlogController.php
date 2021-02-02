<?php
 
namespace App\Http\Controllers;
 
use Canvas\Models; 

use Illuminate\Http\Request;
 
class BlogController extends Controller
{
    public function getPosts()
    {

            $posts = \Canvas\Models\Post::with('tags', 'topic')->published()->orderByDesc('published_at')->simplePaginate(10);
            $siteTitle = "Falling into a Labyrinth | All posts";
        return view('blog.index', compact('posts', 'siteTitle'));
    }

    public function getPostsByTag(string $slug)
    {
        if (\Canvas\Models\Tag::where('slug', $slug)->first()) {
                $siteTitle = "Tags | $slug";

                $posts = \Canvas\Models\Post::whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10);

                return view("blog.tag", compact('posts', 'siteTitle'));


            // This commented section was the original form of the function before the above was made. 
            // 01/16/21
            
            // $data = [
            //     'posts' => \Canvas\Models\Post::whereHas('tags', function ($query) use ($slug) {
            //         $query->where('slug', $slug);
            //     })->published()->orderByDesc('published_at')->simplePaginate(10),
            // ];
 
            // return view("blog.tag", compact('data'));
        } else {
            abort(404);
        }
    }
 
    public function getPostsByTopic(string $slug)
    {
        if (\Canvas\Models\Topic::where('slug', $slug)->first()) {
            $siteTitle = "Topics | $slug";
            $data = [
                'posts' => \Canvas\Models\Post::whereHas('topic', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];
 
            return view('blog.topic', compact('data', 'siteTitle'));
        } else {
            abort(404);
        }
    }
 
    public function findPostBySlug(string $slug)
    {
        $posts = \Canvas\Models\Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);
        $siteTitle = "Falling into a Labyrinth | $slug";
 
        if (optional($post)->published) {
            $data = [
                'author' => $post->user,
                'post'   => $post,
                'meta'   => $post->meta,
            ];
 
            // IMPORTANT: This event must be called for tracking visitor/view traffic
            event(new \Canvas\Events\PostViewed($post));
 
            return view('blog.show', compact('data', 'siteTitle'));
        } else {
            abort(404);
        }
    }
}