@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('msg'))
    <div class="alert alert-success" role="alert">
        {{session()->get('msg')}}
    </div>
    @endif
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <form role="form" method="POST" action="{{route('admin-password')}}">
            <input type="hidden" name="id" value="{{$admin->id}}" />
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Ganti Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h1>{{$admin->name}}</h1>
                        <div class="form-group">
                            <input id="inputpassword" name="password" type="password" class="form-control" placeholder="Password Baru">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center flex-wrap">
                        <button type="submit" name="status" value="2" class="btn btn-primary mb-2">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Welcome, {{$admin->name}}</h3>
        <div class="d-flex flex-wrap justify-content-end" style="gap: 8px;">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#passwordModal">Ganti Password</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
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
        <div class="col-12 col-md-6">
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