@extends('control_panel.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="width: 900px">
                <h4 class="card-title">Edit product form</h4>
                <img class="rounded"  width="200px" height="200px"  style="margin-bottom: 20px" src="{{ old('image',$product->image) }}">
                <form class="forms-sample" action="{{ route('products.update' , $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" value="{{ old('name',$product->name) }}" class="form-control" id="Name" placeholder="Name">
                        @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="CategoryId">Category Id</label>
                        <input type="text" name="category_id" value="{{ old('category_id',$product->category_id) }}" class="form-control" id="CategoryId" placeholder="Category Id">
                        @if($errors->has('category_id'))
                            <span style="color: red;">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" name="price" value="{{ old('price',$product->price) }}" class="form-control" id="Price" placeholder="Price">
                        @if($errors->has('price'))
                            <span style="color: red;">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea type="text" name="description" class="form-control" id="Description" placeholder="Description">{{ old('description',$product->description) }}</textarea>
                        @if($errors->has('description'))
                            <span style="color: red;">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Status">Status</label>
                        <input type="number" name="status" value="{{ old('status',$product->status) }}" class="form-control" id="Status" placeholder="status">
                        @if($errors->has('status'))
                            <span style="color: red;">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="image" name="image" class="form-control" id="Image" placeholder="Image">
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
