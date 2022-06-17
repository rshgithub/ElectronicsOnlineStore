@extends('components.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="width: 900px">
                <h4 class="card-title">enter hotel form</h4>
                <form class="forms-sample" action="{{ route('products.store') }}" method="post"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="Name"
                               placeholder="Name">
                        @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="CategoryId">Category Name</label>
                        <select style="margin-left: 10px" value="{{old('category_id')}}" name="category_id"
                                class="form-select form-select-sm" aria-label=".form-select-sm example" id="CategoryId">

                            @foreach($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <span style="color: red;">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="price" value="{{old('price')}}" class="form-control" id="Price"
                               placeholder="Price">
                        @if($errors->has('price'))
                            <span style="color: red;">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea type="text" name="description" rows="5" class="form-control" id="Description"
                                  placeholder="Description">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                            <span style="color: red;">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Status">Status</label>
                        <select style="margin-left: 10px" value="{{old('status')}}" name="status" class="form-select form-select-sm" aria-label=".form-select-sm example" id="Status">
                            <option value="1">new</option>
                            <option value="0">old</option>
                        </select>
                        @if($errors->has('status'))
                            <span style="color: red;">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="Image">
                        @if($errors->has('image'))
                            <span style="color: red;">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
