@extends('template')

@section('navbar')
<div class="container-fluid pembayaran-pubg py-5">
    <div class="row">
        <!-- <form action="">
    <div class="row h-100 pembayaran">
        <div class="userid text-center">
            <h3 class="text-dark">MASUKKAN USER ID</h3>
            <div class="col">
                <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
            </div>
        </div>
    </div>
    </form> -->
        <div id="checkid" class="card card1 mx-auto mt-5" style="width: 45rem;">
            <div class="card-body">
                <div class="d-flex">
                    <h3 id="number">
                        <span class="nn">1</span>
                    </h3>
                    <h3 class="ml-2 pt-2 dcard">
                        MASUKKAN USER ID
                    </h3>
                </div>
                <form action="" method="get">
                    <div class="row">
                        <div class="col">
                            <input id="useridpubg" type="number" class="form-control text-center hidenumber" placeholder="Masukkan User Id">
                        </div>
                    </div>
                    <!-- <input type="hidden" id="username"> -->
                    <input type="hidden" id="hargadm">
                    <div class="text-center">
                        <input id="button-check-idpubg" class="check-button btn mt-3 " type="button" value="Check ID">
                    </div>
                    <p class="deskripsi1 mt-2">Wajib Check ID!! <br> Jika Username Tidak diketahui atau eror maka tidak bisa melanjutkan transaksi</p>
                    <p class="deskripsi">silahkan masukkan user id yang tertera pada profil game anda.
                        Contoh UserID yang anda masukkan:123456789</p>
                </form>
            </div>
        </div>
        <div class="card card1 mx-auto mt-3" style="width: 45rem;">
            <div class="card-body">
                <div class="d-flex">
                    <h3 id="number">
                        <span class="nn">2</span>
                    </h3>
                    <h3 class="ml-2 pt-2 dcard">
                        PILIH NOMINAL TOP UP
                    </h3>
                </div>
                <form>
                    <div class="row pt-4">
                        <form action="">
                            @foreach($data as $dm)
                            <div id="item-pubg" onclick="harga('{{$dm->harga}}','{{$dm->kode_produk}}','{{$dm->nama_produk}}')" class="linedm mt-2">
                                <h6 class=" mt-2 ml-3"><strong>{{$dm->nama_produk}}</strong></h6>
                                <p id="harga" class="ml-3 deskripsiitem">{{$dm->harga}}</p>
                                <img src="{{ asset('asset/img/uc-pubg.jpg/')}}" class="itemdm-ff pb-1" height="57px" width="57px" alt="">
                            </div>
                            @endforeach
                        </form>
                    </div>
                </form>
            </div>
        </div>
        <div id="pembayaran" class="card card1 mx-auto mt-3" style="width: 45rem;">
            <div class="card-body">
                <div class="d-flex">
                    <h3 id="number">
                        <span class="nn">3</span>
                    </h3>
                    <h3 class="ml-2 pt-2 mtd">
                        METODE PEMBAYARAN
                    </h3>
                </div>
                <ul id="paymet" class="payment">
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('gopay')" id="Qris">
                            <span id="PayDiv" class="Pays"></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/Qris.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-gopay">
                                    <div class="price-number" id="price-number-Qris">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('gopay')" id="gopay">
                            <span id="PayDiv" class="Pays"></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/gopay.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-gopay">
                                    <div class="price-number" id="price-number-gopay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('shopeepay')" id="shopeepay">
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/shopeepay.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-shopeepay">
                                    <div class="price-number" id="price-number-shopeepay">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('bca_va')" id="atm">
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/bca.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-bca">
                                    <div class="price-number" id="price-number-bca">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('bri_va')" id="indosat">
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/bri.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-bri">
                                    <div class="price-number" id="price-number-bri">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('bni_va')" id=dana>
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/bni22.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-bni">
                                    <div class="price-number" id="price-number-bni">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('alfamart')" id="ovo">
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/Alfamart.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-alfamart">
                                    <div class="price-number" id="price-number-alfamart">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('indomaret')" id="ovo">
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/Indomaret.png/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <input type="hidden" id="real-harga-indomaret">
                                    <div class="price-number" id="price-number-indomaret">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card card1 mx-auto mt-3" style="width: 45rem;">
            <div class="card-body">
                <div class="d-flex">
                    <h3 id="number">
                        <span class="nn">4</span>
                    </h3>
                    <h3 class="ml-2 pt-2 dcard">
                        BELI!
                    </h3>
                </div>
            </div>
            <div class="container">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Masukkan No.hp" id="nohp" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" id="pay-button" class="btn button-buy mb-3" data-toggle="modal" data-target="#staticBackdrop">Bayar Sekarang!</button>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="usernamepubg">
<input type="hidden" id="skuproduk">
<input type="hidden" id="skucode">
<input type="hidden" id="hargaakhir">
<input type="hidden" id="metodepembayaran">

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset('asset/img/payment-modal.png')}}" width="35px" height="35px" class="mr-2" alt="">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="">Mohon untuk Cek apakah Data sudah sesuai</h4>
                    <h6 class="text-secondary font-weight-bold mr-1">Data Customer <img src="{{ asset('asset/img/pablita-line.png')}}" width="335px" alt=""></h6>
                    <h6 class="">User : <span class="user-move text-dark font-weight-bold" id="modal_useridff"></span></h6>
                    <h6 class="">Username : <span class="username-move text-dark font-weight-bold" id="modal_usernameff"></span></h6>
                    <h6 class="text-secondary font-weight-bold mr-1">Data Customer <img src="{{ asset('asset/img/pablita-line.png')}}" width="335px" alt=""></h6>
                    <h6 class="">Harga : <span class="harga-move text-dark font-weight-bold" id="modal_harga"></span></h6>
                    <input type="hidden" id="hargamodal">
                    <h6 class="">No.HP : <span class="nohp-move text-dark font-weight-bold" id="modal_nohp"></span></h6>
                    <h6 class="">Method : <span class="method-move text-dark font-weight-bold" id="modal_metodepembayaran"></span></h6>
            </div>
            <div class="modal-footer">
                <button type="button" id="bayarakhir-ff" class="btn btn-primary">Bayar!</button>
            </div>
        </div>
    </div>
</div>
@stop