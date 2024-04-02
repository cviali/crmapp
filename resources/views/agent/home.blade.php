@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('msg'))
    <div class="alert alert-warning" role="alert">
        {{session()->get('msg')}}
    </div>
    @endif
    @if (session()->has('err'))
    <div class="alert alert-danger" role="alert">
        {{session()->get('err')}}
    </div>
    @endif
    @if(isset($customer))
    <div class="modal fade" id="followupModal" tabindex="-1" role="dialog" aria-labelledby="followupModalLabel" aria-hidden="true">
        <form role="form" method="POST" action="{{route('update-contact')}}">
            <input type="hidden" name="id" value="{{$customer->id}}" />
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="followupModalLabel">Konfirmasi Kontak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h1>{{$customer->name}}</h1>
                        Nomor Telepon:
                        <div class="d-flex justify-content-center" style="gap: 8px;">
                            <h5 class="mb-0">{{$customer->phone}}</h5>
                            <div class="d-flex align-items-center">
                                <a href="https://wa.me/62{{$customer->phone}}" target="_blank" class="badge badge-success">
                                    Kontak Whatsapp
                                </a>
                            </div>
                        </div>
                        <div>
                            Sumber Data:<h5>{{$customer->source}}</h5>
                        </div>
                        <div class="form-group">
                            <input id="inputnotes" name="notes" type="text" class="form-control" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center flex-wrap">
                        <button type="submit" name="status" value="4" class="btn btn-secondary mb-2">Tidak Berminat</button>
                        <button type="submit" name="status" value="3" class="btn btn-danger mb-2">WhatsApp Tidak Aktif</button>
                        <button type="submit" name="status" value="2" class="btn btn-success mb-2">WhatsApp Aktif</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endif
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <form role="form" method="POST" action="{{route('update-password')}}">
            <input type="hidden" name="id" value="{{$handler->id}}" />
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
                        <h1>{{$handler->name}}</h1>
                        <div class="form-group">
                            <input id="inputpassword" name="password" type="password" class="form-control" required placeholder="Password Baru">
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
        <h3 class="mb-0">Welcome, {{$handler->name}}</h3>
        <div class="d-flex flex-wrap justify-content-end" style="gap: 8px;">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#passwordModal">Ganti Password</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            @if(isset($customer))
            @if($customer->handler_id != null)
            <div class="card text-white bg-primary">
                <div class="card-header text-center">Customer Data</div>
                <div class="card-body text-center">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>{{$customer->name}}</h1>
                    Sumber:<h5>{{$customer->source}}</h5>
                    Agent:<h5>{{$handler->name}}</h5>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success" data-toggle="modal" data-target="#followupModal">Update Followup</button>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-header text-center">Customer Data</div>
                <div class="card-body text-center">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>{{$customer->name}}</h1>
                    Sumber:<h5>{{$customer->source}}</h5>
                </div>
                <div class="card-footer text-center">
                    <form role="form" method="POST" action="{{route('start-contact')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$customer->id}}" />
                        <button type="submit" class="btn btn-success">Kontak WhatsApp</button>
                    </form>
                </div>
            </div>
            @endif
            @else
            <div class="text-center">Tidak ada customer.</div>
            @endif
        </div>
    </div>
</div>
@endsection