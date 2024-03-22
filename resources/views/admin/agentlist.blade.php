@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agents as $agent)
            <tr>
                <th scope="row">{{$agent->id}}</th>
                <td>{{$agent->name}}</td>
                <td>{{$agent->username}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection