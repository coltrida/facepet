<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class PostService
{
    public function listPostPaginate($page)
    {
        return Post::latest()->paginate(6, ['*'], 'page', $page);
    }

    public function listPost()
    {
        return Post::with('user')->latest()->get();
    }

    public function listPostOfMineAndMyFriends($idUser)
    {
        $followingIds = User::find($idUser)->following()->get()->pluck('id');
        $followingIds->push($idUser);
        return Post::with('user', 'comments', 'likes', 'tags')->whereIn('user_id', $followingIds)
            ->latest()
            ->get();
    }

    public function numberOfMyPosts($idUser)
    {
        return User::with('posts')->find($idUser)->posts->count();
    }

    public function savePost($request)
    {
        return Post::create($request->all());
    }

    public function myPostsWithComments($idUser)
    {
        return User::with(['posts' => function($p){
            $p->with(['comments' => function($c){
                $c->with(['user', 'replies' => function($r){
                    $r->with('user');
                }]);
            }])
                ->latest();
        }])
            ->find($idUser)
            ->posts;
    }

    public function postWithComments($idPost)
    {
        return Post::with(['user','comments' => function($c){
            $c->with(['user', 'replies' => function($r){
                $r->with('user');
            }]);
        }])->find($idPost);
    }

    public function myPosts($idUser)
    {
        return User::with(['posts' => function($p){
            $p->latest();
        }])->find($idUser)->posts;
    }

    public function post($idPost)
    {
        return Post::with('user')->find($idPost);
    }

    public function deletePost($idPost)
    {
        return Post::find($idPost)->delete();
    }

    public function createPost($request)
    {
        return Post::create($request->all());
    }

    public function addCommentToPost($request)
    {
        return Comment::create($request->all());
    }

    public function toggleLikeToPost($idPost)
    {
        Post::find($idPost)->likes()->toggle(auth()->id());
    }
}
