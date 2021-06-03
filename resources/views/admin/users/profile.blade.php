<x-admin-master>
    @section('content')
        <h1>User Profile for: {{$user->name}}</h1>
         <div class="row">
            <div class="col-sm-6">
                 <form method="post" action="{{route('user.profile.edit',$user)}}" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')

                         <div class="mb-4">
                             <img class="img-profile rounded-circle " width="80px" height="80px" src="{{$user->avatar}}">
                         </div>
                         <div class="form-group">
                             <label for="avatar">Update User Photo</label>
                             <input type="file" name="avatar" class="form-control-file" id="avatar">
                             @error('avatar')
                             <div class="text-danger">
                                 {{$message}}
                             </div>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label for="username">Username</label>
                             <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">

                             @error('username')
                             <div class="invalid-feedback">
                                 {{$message}}
                             </div>
                             @enderror

                         </div>
                         <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}">

                             @error('name')
                             <div class="invalid-feedback">
                                 {{$message}}
                             </div>
                             @enderror

                         </div>
                         <div class="form-group">
                             <label for="email">Email</label>
                             <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">

                             @error('email')
                             <div class="invalid-feedback">
                                 {{$message}}
                             </div>
                             @enderror

                         </div>
                            @if(auth()->user()->userHasRole('Admin'))
                         <div class="form-group">
                             <label for="role">Role</label>
{{--                             <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role" value="{{$user->roles}}">--}}
                             <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                 @foreach($roles as $role)
                                 <option value="{{$role->id}}">{{$role->name}}</option>
                                 @endforeach

                             </select>
                             @error('role')
                             <div class="invalid-feedback">
                                 {{$message}}
                             </div>
                             @enderror

                         </div>
                     @endif

                         <div class="form-group">
                             <label for="password">Password</label>
                             <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">

                             @error('password')
                             <div class="invalid-feedback">
                                 {{$message}}
                             </div>
                             @enderror

                         </div>
                         <div class="form-group">
                             <label for="password_confirmation">Confirm Password</label>
                             <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password">

                             @error('password_confirmation')
                             <div class="invalid-feedback">
                                 {{$message}}
                             </div>
                             @enderror

                         </div>
                             <button type="submit" class="btn btn-primary" style="margin-bottom: 5px;">Submit</button>
                 </form>
            </div>
         </div>

    @endsection
</x-admin-master>
