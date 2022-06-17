@extends('components.master')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h3 class="text-center">{{ $categoryProducts->title }}'s Products</h3>
                        </div>
                        <a href="{{ route('products.create') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Creat New Product</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-success text-center">
                                <th>id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category Title</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                            @foreach($categoryProducts->products as $product)
                                <tr class="text-center">
                                    <td>{{ $product->id }}</td>
                                    <td> <img src="{{ $product->product_image }}"> </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category_title }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->product_status }}</td>
                                    <td>
                                        <a href="{{ route('products.edit',$product->id) }}"class="btn btn-outline-warning">Edit</a>

                                        <form action="{{ route('products.destroy',$product->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a
                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                    class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
    </div>
@endsection
