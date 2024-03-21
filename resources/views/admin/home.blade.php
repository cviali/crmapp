@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('msg'))
    <div class="alert alert-success" role="alert">
        {{session()->get('msg')}}
    </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Input Manual</div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{route('add-customer')}}">
                        @csrf
                        <div class="form-group">
                            <input id="inputname" name="name" type="text" class="form-control" placeholder="Nama Customer" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="inputphone" name="phone" type="text" class="form-control" placeholder="Nomor Telepon (8XXXX)" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Input</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Upload Data</div>
                <div class="card-body">
                    <form role="form" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Input</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection