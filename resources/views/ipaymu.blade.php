@extends('template')

@section('navbar')
<div class="container-fluid pembayaran-ipay">
    <div class="row">
<div class="card text-center card-ipay mx-auto">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    
  {{print_r($data)}}
      

     <a href="ipaymu">ipaymu</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
</div>
</div>
</div>
@stop