<x-admin-master>
@section('content')
    <div class="row">
    <div class="col-sm-3">
        <form method="post" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                <div>
                    @error('name')
                    <span><strong>{{$message}}</strong></span>
                    @enderror

                </div>

            </div>
            <button class="btn btn-primary btn-block"type="submit">Create</button>

        </form>

    </div>

        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                                    <td>{{$category->created_at ? $category->created_at->diffForHumans() :  'no date'}}</td>
                                    <td>
                                        <form method="post" action="{{route('admin.categories.destroy',$category->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
</x-admin-master>
