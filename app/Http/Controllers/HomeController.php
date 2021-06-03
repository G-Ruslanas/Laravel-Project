<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $apiResponse = Http::get('https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForMonth&month='.$month.'&year='.$year.'&country=ltu&region=&holidayType=public_holiday');
//        $apiResponse = json_decode($apiResponse, true);

        $data = $apiResponse->json();
        return view('home',['posts'=>$posts,'categories'=>$categories,'data'=>$data]);
    }

    public function show(){
        return view('about');
    }
}
