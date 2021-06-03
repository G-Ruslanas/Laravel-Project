<x-admin-master>
    @section('content')
        <h1>Edit {{$category->name}} Category</h1>
        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{route('admin.categories.update',$category->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name"> New Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                        <div>
                            @error('name')
                            <span><strong>{{$message}}</strong></span>
                            @enderror

                        </div>

                    </div>
                    <button class="btn btn-primary btn-block"type="submit">Update</button>

                </form>
            </div>
        </div>
    @endsection
</x-admin-master>

