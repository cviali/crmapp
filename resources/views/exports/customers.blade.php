@php
use App\User;
@endphp

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Agent</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{User::where('id', '=', $customer->handler_id)->first()->name}}</td>
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