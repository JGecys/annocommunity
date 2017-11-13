<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Community;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function posts(Request $request, Community $community)
    {
        if ($request->ajax() && $request->acceptsJson()) {
            return json_encode($community->posts()
                ->where('title', 'LIKE', '%' . urldecode($request->get('filter', '')) . '%')
                ->with('commentCount')
                ->orderBy('updated_at', 'desc')
                ->paginate(30));
        } else {
            return abort(404);
        }
    }

    public function post(Request $request, Community $community, $post)
    {
        $post = Post::with(['user', 'comments'])->find($post);
        $communities = Community::whereIn('id', $request->session()->get('communities'))->get();
        return view('post')
            ->with('community', $community)
            ->with('communities', $communities)
            ->with('post', $post)
            ->with('user', User::find($request->session()->get('user')));
    }

    public function comment(Request $request, Community $community, Post $post)
    {
        if ($request->isMethod('post')) {
            $request->validate(['comment' => 'required|max:500']);
            $content = $request->get('comment', '');
            if ($content == '') {
                return redirect('/community/'.$community->id.'/post/'.$post->id, 400)->withErrors(['Comment is empty']);
            }
            $comment = new Comment();
            $comment->comment = $content;
            $reply_to = $request->get('reply_to', -1);
            if($reply_to >= 0){
                $comment->reply_to = $reply_to;
            }
            $comment->post_id = $post->id;
            $comment->user_id = session('user');
            $comment->save();
            $post->touch();
        }
        return redirect('/community/'.$community->id.'/post/'.$post->id);
    }

}
