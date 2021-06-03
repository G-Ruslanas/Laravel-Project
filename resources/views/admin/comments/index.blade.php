<x-admin-master>
@section('content')
    @if(count($comments)>0)
            <h1>Comments</h1>
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>View Post</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>View Post</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->author}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->body}}</td>
                                <td>{{$comment->created_at}}</td>
                                <td><a href="{{route('post',$comment->post->id)}}">{{$comment->post->title}}</a></td>
                                <td>
                                    @if($comment->is_active == 1)
                                    <form action="{{route('admin.update',$comment)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_active" value="0"></input>
                                        <button type="submit" class="btn btn-info">Un-approve</button>
                                    </form>

                                    @else
                                    <form action="{{route('admin.update',$comment)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_active" value="1"></input>
                                        <button type="submit" class="btn btn-primary">Approve</button>
                                    </form>
                                    @endif
                                    <td>
                                        <form action="{{route('admin.destroy',$comment)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
        <h1 class="text-center">No Comments</h1>
        @endif
@endsection
    @section('scripts')
    <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
