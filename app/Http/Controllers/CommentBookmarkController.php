<?php

namespace App\Http\Controllers;

use App\Models\CommentBookmark;
use App\Http\Requests\StoreCommentBookmarkRequest;
use App\Http\Requests\UpdateCommentBookmarkRequest;

class CommentBookmarkController extends Controller
{
    public function __invoke($id)
    {
        $bookmark = CommentBookmark::
        where('comment_id', $id)
        ->where('user_id', auth()->id())
        ->first();
    
        $msg = "";
    
        if($bookmark == null)
        {
            $msg = "Comment Bookmarked Succesfully !";
            CommentBookmark::create(['user_id' => auth()->id(),'comment_id' => $id,]);
        }
        else
        {
            $bookmark->delete();
            $msg = "Comment Removed From Bookmarks Succesfully !";
        }
    
        return redirect()->back()->with('comment_bookmark',$msg);
    }
}
