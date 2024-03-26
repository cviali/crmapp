@extends('layouts.app')

@section('content')
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <form role="form" method="POST" action="{{route('agent-password')}}">
        <input type="hidden" name="id" value="{{$agent->id}}" />
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
                    <h1>{{$agent->name}}</h1>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <form role="form" method="POST" action="/agent-delete/{{$agent->id}}">
        <input type="hidden" name="id" value="{{$agent->id}}" />
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h1>{{$agent->name}}</h1>
                </div>
                <div class="modal-footer d-flex justify-content-center flex-wrap">
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="status" value="2" class="btn btn-danger mb-2">Hapus</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="/agent-list">
            <div>◀ Kembali</div>
        </a>
        <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#passwordModal">Ganti Password</button>
            <button class=" btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus Agent</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div>Nama Agent</div>
                    <h1>{{$agent->name}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div>Tanggal Laporan</div>
                    <h1>{{date('d-m-Y', strtotime($date))}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div>Total Dikontak</div>
                    <h1>{{$total}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <div class="card text-primary">
                <div class="card-body">
                    <div>Sedang Dikontak</div>
                    <h1>{{$inprogress}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <div class="card text-success">
                <div class="card-body">
                    <div>WhatsApp Aktif</div>
                    <h1>{{$active}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <div class="card text-danger">
                <div class="card-body">
                    <div>WhatsApp Tidak Aktif</div>
                    <h1>{{$inactive}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <div class="card text-secondary">
                <div class="card-body">
                    <div>Tidak Tertarik</div>
                    <h1>{{$notinterested}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection