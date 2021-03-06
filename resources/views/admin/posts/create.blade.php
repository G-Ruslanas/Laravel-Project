<x-admin-master>

    @section('content')
        <h1>Create</h1>
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
            @error('title')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id"  class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image">
            @error('post_image')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
            @error('body')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection

</x-admin-master>
