@extends('components.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="width: 900px">
                <h4 class="card-title">Edit product form</h4>
                <img class="rounded"  width="200px" height="200px"  style="margin-bottom: 20px" src="{{ old('image',$ad->ad_image) }}">
                <form class="forms-sample" action="{{ route('ads.update' , $ad->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="Image">
                        @if($errors->has('image'))
                            <span style="color: red;">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
