@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/database-list">
        <div class="mb-4">◀ Kembali</div>
    </a>
    <div class="row">
        <div class="col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div>Nama Database</div>
                    <h1>{{$source}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div>Total Data</div>
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