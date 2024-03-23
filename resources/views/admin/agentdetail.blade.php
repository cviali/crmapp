@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/agent-list">
        <div>◀ Kembali</div>
    </a>
    <h1>{{$agent->name}}</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div>Total Dikontak</div>
                    <h1>{{$total}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-primary">
                <div class="card-body">
                    <div>Sedang Dikontak</div>
                    <h1>{{$inprogress}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-success">
                <div class="card-body">
                    <div>WhatsApp Aktif</div>
                    <h1>{{$active}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-danger">
                <div class="card-body">
                    <div>WhatsApp Tidak Aktif</div>
                    <h1>{{$inactive}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
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