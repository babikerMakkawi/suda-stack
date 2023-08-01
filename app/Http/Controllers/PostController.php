<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentBookmark;
use App\Models\Post;
use App\Models\PostBookmark;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {        
        $post = Post::create([
            'user_id' => auth()->id(),
            'status_id' => 1,
            'category_id' => rand(1,6),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => Str::words($request->body,15),
            'body' => $request->body,
        ]);

        
        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
            foreach ($tags as $tag) {
                $my_tag = Tag::updateOrCreate([
                    'name' => $tag
                ]);
            $post->tags()->attach($my_tag->id);
            }
        }
            
        return redirect()->route('home')->with('post-sucess','Posted Succesfully');
    }

    public function show(Post $post)
    {
        $post = Post::with(['user','tags', 'post_bookmark', 'comment','comment.user'])
        ->where('slug', '=', $post->slug)
        ->when(request('order'), function($query){
            switch (request('order')) {
                case 'rating':
                    return $query->latest();
                case 'latest':
                    return $query->latest();
                case 'oldest':
                    return $query->oldest();
            }})
            ->first();

        // $user_post_bookmark = PostBookmark::where('user_id', '=', auth()->id())
        // ->where('post_id', '=', $post->id)->first();

        return view('posts.post', compact('post'));
    }

    public function edit(post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post','categories'));
    }

    public function update(Request $request, post $post)
    {
        $postPre = $post->name;

        $post->update([
            'name' => $request->name,
            'auth' => $request->auth,
            'category_id' => $request->cat_id,
        ]);

        $msg = $postPre != $post->name ?
        "[ " . $postPre . " ] Updated To [ " . $post->name . " ] Successfully":
        "[ " . $post->name . " ] Updated Successfully";


        return redirect()->route('posts.index')->with('update',$msg);
    }

    public function destroy(post $post)
    {
        $post->delete();
        $msg = "[" . $post->name . "] Deleted Successfully";

        return redirect()->route('posts.index')->with('delete',$msg);
    }
}
