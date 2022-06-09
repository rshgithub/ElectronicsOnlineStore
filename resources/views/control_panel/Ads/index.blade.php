@extends('components.master')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h3 class="text-center">Ad Images Table</h3>
                        </div>
                        <a href="{{ route('ads.create') }}" class="btn btn-outline-secondary" role="button" aria-pressed="true">Creat New Ad Image</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-warning text-center">
                                <th> id </th>
                                <th> image </th>
                                <th> options </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                                <tr class="text-center">
                                    <td>{{ $ad->id }}</td>
                                    <td> <img src="{{ $ad->ad_image }}"> </td>
                                    <td>
                                        <a href="{{ route('ads.edit',$ad->id) }}"class="btn btn-outline-warning">Edit</a>
                                        <form action="{{ route('ads.destroy',$ad->id) }}" method="post" style="display: inline-block">
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
