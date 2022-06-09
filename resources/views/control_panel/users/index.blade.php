@extends('components.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h3 class="text-center">Users Table</h3>
                        </div>
                        <a href="{{ route('users.create') }}" class="btn btn-outline-primary" role="button"
                           aria-pressed="true">Creat New User</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-primary text-center">
                                <th> id</th>
                                <th> name</th>
                                <th> role</th>
                                <th> email</th>
                                <th> phone</th>
                                <th> options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <td> {{ $user -> id }} </td>
                                    <td> {{ $user -> name }} </td>
                                    <td> {{ $user -> user_role }} </td>
                                    <td> {{ $user -> email }} </td>
                                    <td> {{ $user -> phone }} </td>

                                    <td>
                                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-warning">Edit</a>

                                        <form action="{{ route('users.destroy',$user->id) }}" method="post"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
