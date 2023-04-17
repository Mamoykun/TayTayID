@extends('template')

@section('navbar')
<div class="container-fluid qrisbayar">
  <div class="row">
    <div class="card qris-card text-center d-flex justify-content-center" style="width: 35rem">
      <div class="card-header pb-3 pt-3">
        <img src="{{ asset('asset/img/logogram 4.png')}}" width="90px" class="" height="90px" alt="">
      </div>
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-6 qris-gambar1">
            <img src="{{asset('asset/img/Qris1.png/')}}" width="200px" class="mb-3 qris-gambar" height="90px" alt="">
            </div>
           <div class="col-6 cara-bayar1">
           <a href="" class="btn btn-secondary cara-bayar">Cara Bayar?</a>
           </div>
          </div>
        </div>
        <p class="card-text">{{!! QrCode::size(250)->generate($data->data->qris_content); !!}} </p>
        <p class="font-weight-bold">NMID: ID1022227487280</p>
        <p class="font-weight-bold">TayTay ID</p>
        <p class="">Segera Bayar Sebelum expired:</p>
        <a href="checkQris" class="btn btn-primary">Check Status Bayar</a>
      </div>
      <div class="card-footer text-muted">
        Pembayaran Qris TayTayID
      </div>
    </div>
  </div>
</div>
@stop