@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('msg'))
    <div class="alert alert-success" role="alert">
        {{session()->get('msg')}}
    </div>
    @endif

    <form role="form" method="POST" action="{{route('whitelist-add')}}">
        @csrf
        <div class="form-group d-flex" style="gap: 8px;">
            <input class="form-control" type="text" name="ip" placeholder="IP Address" required />
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">IP</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($whitelist as $address)
            <tr>
                <td>{{$address->ip}}</td>
                <td><a class="btn btn-danger" href='/whitelist-delete/{{$address->ip}}'>Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection