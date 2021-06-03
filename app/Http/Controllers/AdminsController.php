<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index(){

        if(auth()->user()->userHasRole('Admin')) {

            $postsCount = Post::count();
            $categoriesCount = Category::count();
            $commentsCount = Comment::count();
        }
        else {
            $id = auth()->user()->id;
            $postsCount = Post::where('user_id',$id)->count();
            $categoriesCount = Category::count();
            $commentsCount = Comment::count();


        }

        return view('admin.index',['postsCount'=>$postsCount,'categoriesCount'=>$categoriesCount,'commentsCount'=>$commentsCount]);

    }

}
