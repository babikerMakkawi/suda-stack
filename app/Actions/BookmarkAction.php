<?php 

namespace App\Actions;

use App\Models\PostBookmark;

class BookmarkAction
{
    public function handle($id)
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
?>