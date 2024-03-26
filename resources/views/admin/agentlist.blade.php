@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('msg'))
    <div class="alert alert-success" role="alert">
        {{session()->get('msg')}}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agents as $agent)
            <tr>
                <th scope="row">{{$agent->id}}</th>
                <td>{{$agent->name}}</td>
                <td>{{$agent->username}}</td>
                <td>
                    <a class="btn btn-primary" href='/agent-detail/{{$agent->id}}'>Performa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection