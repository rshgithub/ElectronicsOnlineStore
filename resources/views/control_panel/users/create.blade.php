@extends('control_panel.master')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" style="width: 900px">
            <h4 class="card-title">enter new user</h4>
            <form class="forms-sample" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputUsername1" placeholder="Username">
                    @if($errors->has('name'))
                        <span style="color: red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    <small class="text-danger">* you will never be able to change your email later , please enter carefully .</small>
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
                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="Phone" placeholder="Phone">
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
