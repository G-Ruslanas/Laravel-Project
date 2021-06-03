<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(Post $post, Comment $comments){
        $post = Post::findOrFail($post->id);
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $apiResponse = Http::get('https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForMonth&month='.$month.'&year='.$year.'&country=ltu&region=&holidayType=public_holiday');
//        $apiResponse = json_decode($apiResponse, true);
        $data = $apiResponse->json();
        $comments =$post->comments()->where('is_active',1)->get();
        $categories = Category::all();
        return view('blog-post',['post'=>$post,'comments'=>$comments,'categories'=>$categories,'data'=>$data]);
    }
    public function categories(Category $category){
        $id = $category->id;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $apiResponse = Http::get('https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForMonth&month='.$month.'&year='.$year.'&country=ltu&region=&holidayType=public_holiday');
//        $apiResponse = json_decode($apiResponse, true);
        $data = $apiResponse->json();
        $posts= Post::where('category_id',$id)->paginate(3);
        $categories = Category::all();
        return view('home',['posts'=>$posts,'categories'=>$categories,'data'=>$data]);
    }
    public function search(Request $request){
        $search = $request->input('search');
        $categories = Category::all();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $apiResponse = Http::get('https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForMonth&month='.$month.'&year='.$year.'&country=ltu&region=&holidayType=public_holiday');
        $data = $apiResponse->json();
//        $apiResponse = json_decode($apiResponse, true);
        $posts = Post::query()->where('title','LIKE',"%{$search}%")->paginate(3);
        return view('search',['posts'=>$posts,'categories'=>$categories,'data'=>$data]);

    }

    public function show(){
//
        if(auth()->user()->userHasRole('Admin')){
            $posts = Post::all();
                    }
        else {
            $posts = auth()->user()->posts;
        }

        return view('admin.posts.index',['posts'=>$posts]);

    }

    public function create(){
        $categories = Category::all();
        return view('admin.posts.create',['categories'=>$categories]);

    }

    public function store(){
//        $this->authorize('create',Post::class);
//        auth()->user();
//        dd(\request()->all());
        $inputs = \request()->validate([
            'title'=> 'required|min:8|max:255',
            'category_id'=>'required',
            'post_image'=> 'file|max:2000',
            'body'=> 'required',
        ]);
        if(\request('post_image')){
            $inputs['post_image']= \request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);
        Session::flash('post-created-message','Post was created');
        return redirect()->route('post.show');
    }

    public function destroy(Post $post){
//        if(auth()->user()-id !==$post->user_id)
        if(!auth()->user()->userHasRole('Admin')){
            $this->authorize('delete',$post );
        }
        $post->delete();
        Session::flash('message','Post was deleted');
        return back();

    }

    public function edit(Post $post){
//        $this->authorize('view',$post);
//        if(auth()->user()->can('view',$post)){
//
//
//        }
        $categories = Category::all();
       return view('admin.posts.edit',['post'=>$post,'categories'=>$categories]);
    }

    public function update(Post $post){
        $inputs = \request()->validate([
            'title'=> 'required|min:8|max:255',
            'category_id'=>'required',
            'post_image'=> 'file|max:2000',
            'body'=> 'required',
        ]);

        if(\request('post_image')){
            $inputs['post_image']= \request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->category_id = $inputs['category_id'];
//        auth()->user()->posts()->save($post);
        if(!auth()->user()->userHasRole('Admin')){
            $this->authorize('update',$post );
        }
        $post->save();
        Session::flash('post-updated-message','Post was updated');
        return redirect()->route('post.show');

    }
}
