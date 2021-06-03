<x-admin-master>
@section('content')
    Edit Permission
    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Role: {{$permission->name}}</h1>
            <form method="post" action="{{route('permissions.update',$permission)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text"  name="name" id="name" value="{{$permission->name}}">
                </div>
                <button class="btn btn-primary "style="margin-bottom:5px">Update</button>

            </form>

        </div>

    </div>
@endsection
</x-admin-master>
