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
                            <button type="submit" class="btn btn-primary w-100">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Upload Data</div>
                <div class="card-body">

                    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="inputsource" name="source" type="text" class="form-control" placeholder="Nama Database" required>
                            @error('source')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection