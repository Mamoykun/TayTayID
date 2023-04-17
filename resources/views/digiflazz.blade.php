@extends('template')

@section('navbar')

<div class="card card1 mx-auto mt-3" style="width: 45rem;">
  <div class="card-body">
    <form>
      <div class="row pt-4">
        <form action="">
          @foreach($data as $dm)
          <div id="item" class="linedm mt-4">
            <h6 class="pt-2 ml-3 atas1"><strong>{{$dm->nama_produk}}</strong></h6>
            <p class="ml-3 deskripsiitem">3.500</p>
            <img src="{{ asset('asset/img/dm1.jpg/')}}" class="itemdm pb-1" height="50px" width="50px" alt="">
          </div>
          @endforeach
        </form>
      </div>
    </form>
  </div>
</div>

@stop