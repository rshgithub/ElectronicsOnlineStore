@extends('control_panel.master')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">enter hotel form</h4>
            <form class="forms-sample" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="Name" placeholder="Name">
                    @if($errors->has('name'))
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" name="price" value="{{old('price')}}" class="form-control" id="Price" placeholder="Price">
                    @if($errors->has('price'))
                    <span style="color: red;">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="Details">Details</label>
                    <textarea type="text" name="details" rows="5" class="form-control" id="details" placeholder="Details">{{old('details')}}</textarea>
                    @if($errors->has('details'))
                    <span style="color: red;">{{ $errors->first('details') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection