@extends('components.master')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h3 class="text-center">Categories Table</h3>
                        </div>
                        <a href="{{ route('categories.create') }}" class="btn btn-outline-warning" role="button"
                           aria-pressed="true">Creat New Category</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-warning text-center">
                                <th> id</th>
                                <th> title</th>
                                <th> products count</th>
                                <th> category products</th>
                                <th></th>
                                <th> options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="text-center">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->products_count }}</td>
                                    <td><a href="{{ route('categories.getCategoryProducts',$category->id) }}"
                                           class="btn btn-outline-primary">products</a>
                                    <td>
                                    <td>
                                        <form action="{{ route('categories.destroy',$category->id) }}" method="post"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
