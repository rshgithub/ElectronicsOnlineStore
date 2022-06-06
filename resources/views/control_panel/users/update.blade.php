@extends('control_panel.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="width: 900px">
                <h4 class="card-title">enter user form</h4>
                <img class="rounded"  width="200px" height="200px"  style="margin-bottom: 20px" src="{{ old('user_avatar',$user->user_avatar) }}">
                <form class="forms-sample" action="{{ route('users.update' , $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group" >
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" id="exampleInputUsername" placeholder="Username">
                        @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" id="Email" placeholder="Email" disabled>
                        <small class="text-danger">* you aren't able to change your email .</small>
                        @if($errors->has('email'))
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="userRole">User Role</label>
                        <select value="{{old('role')}}"  class="form-select form-select-sm" aria-label=".form-select-sm example" id="userRole">
                            <option value="1">user</option>
                            <option value="0">admin</option>
                        </select>
                        @if($errors->has('role'))
                            <span style="color: red;">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" name="phone"value="{{ old('phone',$user->phone) }}" class="form-control" id="Phone" placeholder="Phone">
                        @if($errors->has('phone'))
                            <span style="color: red;">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
