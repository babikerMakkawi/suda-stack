<?php

namespace App\Http\Controllers;

use App\Models\PostBookmark;

class PostBookmarkController extends Controller
{
    public function __invoke($id)
    {
        $bookmark = PostBookmark::
        where('post_id', $id)
        ->where('user_id', auth()->id())
        ->first();
    
        $msg = "";
    
        if($bookmark == null)
        {
            $msg = "Bookmarked Successfully !";
            PostBookmark::create(['user_id' => auth()->id(),'post_id' => $id,]);
        }
        else
        {
            $bookmark->delete();
            $msg = "Removed From Bookmarks Successfully !";
        }
    
        return redirect()->back()->with('bookmark',$msg);
    }
}
