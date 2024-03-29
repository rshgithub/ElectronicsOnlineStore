@extends('components.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="width: 900px">
                <h4 class="card-title">enter user form</h4>
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
                        <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" id="Email" placeholder="Email">
                        @if($errors->has('email'))
                            <span style="color: red;">{{ $errors->first('email') }}</span>
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
