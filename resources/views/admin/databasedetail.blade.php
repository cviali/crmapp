@extends('layouts.app')

@php
use App\User;
@endphp

@section('content')
<div class="container">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <form role="form" method="POST" action="{{route('database-delete')}}">
            <input type="hidden" name="source" value="{{$source}}" />
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
                        <h1>{{$source}}</h1>
                    </div>
                    <div class="modal-footer d-flex justify-content-center flex-wrap">
                        <button data-dismiss="modal" aria-label="Close" class="btn btn-secondary mb-2">Batal</button>
                        <button type="submit" name="status" value="2" class="btn btn-danger mb-2">Hapus</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="/database-list">
            <div>◀ Kembali</div>
        </a>
        <div>
            @if($source != 'manual')
            <button class=" btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus Database</button>
            @endif
            <a class="btn btn-primary" href="/export-excel/{{$source}}">Export Database</a>
        </div>
    </div>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Agent</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                @if(User::where('id', '=', $customer->handler_id)->first() == null)
                <td>-</td>
                @else
                <td>{{User::where('id', '=', $customer->handler_id)->first()->name}}</td>
                @endif
                @switch($customer->status_id)
                @case(0)
                <td>Belum Dikontak</td>
                @break
                @case(1)
                <td>Sedang Dikontak</td>
                @break
                @case(2)
                <td>WhatsApp Aktif</td>
                @break
                @case(3)
                <td>WhatsApp Tidak Aktif</td>
                @break
                @case(4)
                <td>Tidak Tertarik</td>
                @break
                @endswitch
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$customers->links()}}
    </div>
</div>
@endsection