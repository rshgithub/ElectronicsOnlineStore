@extends('control_panel.components.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="width: 900px">
                <h4 class="card-title">enter category form</h4>
                <form class="forms-sample" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="Title">title</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="Title" placeholder="Title">
                        @if($errors->has('title'))
                            <span style="color: red;">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
