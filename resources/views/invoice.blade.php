@extends('template')

@section('navbar')
<div class="cotainer-fluid invoice">
  <div class="row">
    @foreach($data as $inv)
    <div class="card mr-5 text-center card-invoice">
      <div class="card-header">
        Invoice
      </div>
      <div class="card-body">
        <h6>Nomor Transaksi:{{$inv->code}}</h6>
        <h6>Jenis Game :{{$inv->Jenis_item}}</h6>
        <h6>Harga :Rp.88.000</h6>
        <h6>Metode Pembayaran :Gopay</h6>
        <h6>Nomor_Telfon :{{$inv->nomor_telepon}}</h6>
        <h6>Tanggal :{{$inv->created_at}}</h6>
        <h6>Status :{{$inv->Status}}</h6>
      </div>
      <div class="card-footer text-muted">
        TayTay ID
      </div>
    </div>
    @endforeach
  </div>
</div>

@stop