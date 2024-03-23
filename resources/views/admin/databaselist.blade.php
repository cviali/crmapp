@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Database</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sources as $source)
            <tr>
                <td>{{$source->source}}</td>
                <td><a class="btn btn-primary" href='/database-detail/{{$source->source}}'>Performa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection