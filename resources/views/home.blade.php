{{--@extends('layouts.app')--}}
<x-home-master>
@section('content')

        <!-- Blog Post -->
        @if($posts)
    @foreach($posts as $post)

        <div class="card mb-4 "style="margin-top: 25px">
            <h2 class="card-title">{{$post->title}}</h2>
            <img class="card-img-top" src="{{$post->post_image =='http://127.0.0.1:8000/storage' ? $post->post_image = 'https://via.placeholder.com/900x300.png' : $post->post_image}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{Str::limit($post->body,'100','...')}}</p>
                <a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted {{$post->created_at->diffForHumans()}}
                <strong>{{$post->user->name}}</strong>
            </div>
        </div>
    @endforeach
            @endif
            @if(count($posts)==0)
                <div class="container" style="margin-top: 25px">
                    <h1>No Posts For Selected Category</h1>
                </div>
            @endif

        <!-- Categories Widget -->
    @section('categories')
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            @if($categories)
                                @foreach($categories as $category)
                            <li>
                                <a href="{{route('posts.categories',$category->id)}}">{{$category->name}}</a>
                            </li>
                                @endforeach
                            @endif
                        </ul>
                        </div>
                    </div>
                </div>
    @endsection
    @section('search')
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="{{route('posts.search')}}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                <button class="btn btn-secondary" type="Submit">Search</button>
              </span>
                </div>
            </form>
        </div>
    @endsection
    @section('widget')
        <h5 class="card-header">Upcoming holidays in LTU</h5>
        <div class="card-body">
{{--            @foreach($data as $response)--}}
{{--                {{$response['date']}}--}}
{{--            @endforeach--}}

            @for($i =0; $i<count($data);$i++)
                <div class="row">
                <div class="col-sm-7">
                    <label for="name"><bold>Name:</bold></label>
                    {{--                {{dd($data[0]['name'][0])}}--}}
                    {{$data[$i]['name'][1]['text']}}
                </div>
                <div class="col-sm-5">
                    <label for="date"><bold>Date:</bold></label>
                    {{--                {{dd($data[0]['name'][0])}}--}}
                    {{$data[$i]['date']['day']." ".$data[$i]['date']['month']." ".$data[$i]['date']['year']}}

                </div>
                </div>
            @endfor


        </div>
    @endsection

        <!-- Pagination -->
{{--        <ul class="pagination justify-content-center mb-4">--}}
{{--            <li class="page-item">--}}
{{--                <a class="page-link" href="#">&larr; Older</a>--}}
{{--            </li>--}}
{{--            <li class="page-item disabled">--}}
{{--                <a class="page-link" href="#">Newer &rarr;</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
        <div class="row justify-content-center">
            <div class="justify-content-center">
                {{$posts->render()}}
            </div>
        </div>
@endsection
</x-home-master>
