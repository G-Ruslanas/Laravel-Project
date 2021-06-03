<x-home-master>

@section('content')

    <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <bold>{{$post->user->name}}</bold>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->post_image =='http://127.0.0.1:8000/storage' ? $post->post_image = 'https://via.placeholder.com/900x300.png' : $post->post_image}}" alt="">

        <hr>

        <!-- Post Content -->
        <p>{{$post->body}}</p>
        <hr>

        @if(Session::has('comment_message'))
            <div class="alert alert-success">

                {{session('comment_message')}}

            </div>

        @endif

    @if(Auth::check())

        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form action="{{route('admin.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
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

    @if(count($comments)>0)
    @foreach($comments as $comment)
        <!-- Single Comment -->
        <div class="media mb-4">
            <img height="64" class="d-flex mr-3 rounded-circle" src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" alt="">
            <div class="media-body">
                <h6 class="mt-0">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h6>
                <p>{{$comment->body}}</p>
            </div>
        </div>
    @endforeach
    @endif

@endsection

</x-home-master>
