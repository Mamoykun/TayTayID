@extends('template')

@section('navbar')
<div class="container-fluid pembayaran py-5">
    <div class="row">
        <div class="card card1 mx-auto mt-5" style="width: 45rem;">
            <div class="card-body">
                <div class="mx- auto">
                    <h3 class="ml-2 pt-2 dcard">
                        TATA CARA PEMBELIAN
                    </h3>
                </div>
                <div>
                    <h6 class="ml-3 pt-3"> <strong>1.</strong>Masukkan User ID dan Server Anda</h6>
                    <h6 class="ml-3"> <strong>2.</strong>Silahkan Check ID terlebih dahulu dengan menekan tombol Check ID</h6>
                    <h6 class="ml-3"> <strong>3.</strong>Jika Pop UP Username tidak muncul atau eror maka tidak bisa melanjutkan transaksi</h6>
                    <h6 class="ml-3"> <strong>4.</strong>Pilih Jumlah diamond yang anda inginkan</h6>
                    <h6 class="ml-3"> <strong>5.</strong>Pilih metode pembayaran yang anda mau</h6>
                    <h6 class="ml-3"> <strong>6.</strong>Masukkan nomor Whats App anda </h6>
                    <h6 class="ml-3"> <strong>7.</strong>Klik Bayar Sekarang</h6>
                    <h6 class="ml-3"> <strong>8.</strong>Pastikan Data yang ada di pop up sudah sesuai dengan yg anda pilih</h6>
                    <h6 class="ml-3"> <strong>9.</strong>Jika sudah sesuai klik bayar!</h6>
                    <h6 class="ml-3"> <strong>10.</strong>Saat selesai melakukan pembayaran diwajibkan untuk stay di halaman terlebih dahulu sampai muncul notifikasi sukses</h6>
                    <h6 class="ml-3"> <strong>11.</strong>Jika sudah maka Top Up sudah selesai:)</h6>
                </div>
            </div>
        </div>
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
                            <input id="userserver" type="number" class="form-control text-center hidenumber" placeholder="Masukkan User Id">
                        </div>
                        <div class="col">
                            <input id="zone" type="number" class="form-control text-center hidenumber" placeholder="(Masukkan Server)">
                        </div>
                    </div>
                    <!-- <input type="hidden" id="username"> -->
                    <input type="hidden" id="hargadm">
                    <div class="text-center">
                        <a href="apigames"></a>
                        <input id="button-check" class="check-button btn mt-3 " type="button" value="Check ID">
                    </div>
                    <!-- <p class="deskripsi1 mt-2">Wajib Check ID!! <br> Jika Username Tidak diketahui atau eror maka tidak bisa melanjutkan transaksi</p>
                    <p class="deskripsi">silahkan masukkan user id dan server yang tertera pada profil game anda.
                        Contoh UserID dan SERVER yang anda masukkan:123456789(1234)</p> -->
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
                            <div id="item" onclick="harga('{{$dm->harga}}','{{$dm->kode_produk}}','{{$dm->nama_produk}}')" class="linedm mt-2">
                                <h6 class=" mt-2 ml-3"><strong>{{$dm->nama_produk}}</strong></h6>
                                <p id="harga" class="ml-3 deskripsiitem">{{$dm->harga}}</p>
                                <img src="{{ asset('asset/img/dm1.jpg/')}}" class="itemdm pb-1" height="57px" width="57px" alt="">
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
                        <a class="form-pay-a" onclick="metode('qris')">
                            <span id="PayDiv" class="Pays"></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/Qris2.jpg/')}}" alt="">
                                </figure>
                            </div>
                            <div class="price-pay-container">
                                <div class="price-label">
                                    <strong> Harga </strong>
                                </div>
                                <div class="price-info">
                                    <div class="price-number" id="price-number-Qris">
                                    </div>
                                    <input type="hidden" id="real-harga-Qris">
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('gopay')">
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
                                    <div class="price-number" id="price-number-gopay">
                                    </div>
                                    <input type="hidden" id="real-harga-gopay">
                                </div>
                            </div>
                        </a>
                    </li> -->
                    <!-- <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('shopeepay')">
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
                    </li> -->
                    <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('bca_va')">
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
                        <a class="form-pay-a" onclick="metode('bri_va')">
                            <span id="PayDiv" class=""></span>
                            <div class="logo-pay">
                                <figure class="logo-wrapper">
                                    <img src="{{ asset('asset/img/Logo-BRI.jpg/')}}" alt="">
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
                        <a class="form-pay-a" onclick="metode('bni_va')">
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
                    <!-- <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('alfamart')">
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
                    </li> -->
                    <!-- <li class="form-pay bg-white">
                        <a class="form-pay-a" onclick="metode('indomaret')">
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
                    </li> -->
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
                <form action="" method="">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Masukkan No.Whatsapp" id="nohp" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" id="pay-button" class="btn button-buy mb-3" data-toggle="modal" data-target="#staticBackdrop">Bayar Sekarang!</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <input type="hidden" id="skucode">
    <input type="hidden" id="username">
    <input type="hidden" id="hargaakhir">
    <input type="hidden" id="metodepembayaran">
    <input type="hidden" id="skuproduk">
    <input type="hidden" id="qris-invoice">
    <input type="hidden" id="orderid_qris">
    <input type="hidden" id="orderid">
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header header-datadiri">
                <img src="{{ asset('asset/img/payment-modal.png')}}" width="35px" height="35px" class="mr-2" alt="">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-black-50">Mohon untuk Cek apakah Data sudah sesuai</h5>
                <h6 class="text-secondary font-weight-bold mr-1">Data Customer <img src="{{ asset('asset/img/pablita-line.png')}}" width="335px" alt=""></h6>
                <h6 class="text-secondary">User : <span class="user-move text-dark font-weight-bold" id="modal_user"></span></h6>
                <h6 class="text-secondary">Server : <span class="server-move text-dark font-weight-bold" id="modal_server"></span></h6>
                <h6 class="text-secondary">Username : <span class="username-move text-dark font-weight-bold" id="modal_username"></span></h6>
                <h6 class="text-secondary font-weight-bold mr-1">Ringkasan Pembelian <img src="{{ asset('asset/img/pablita-line.png')}}" width="295px" height="3px" alt=""></h6>
                <h6 class="text-secondary">Harga : <span class="harga-move text-dark font-weight-bold" id="modal_harga"></span></h6>
                <input type="hidden" id="hargamodal">
                <h6 class="text-secondary">No.HP : <span class="nohp-move text-dark font-weight-bold" id="modal_nohp"></span></h6>
                <h6 class="text-secondary">Method : <span class="method-move text-dark font-weight-bold" id="modal_metodepembayaran"></span></h6>
            </div>
            <div class="modal-footer">
                <button type="button" id="bayarakhir" class="btn btn-qris btn-primary">Bayar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-qris" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header header-qris">
                <img src="{{ asset('asset/img/payment-modal.png')}}" width="35px" height="35px" class="mr-2" alt="">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Qris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="body-qris" class="modal-body">
                <!-- <div class="logo-taytay2"><img src="{{ asset('asset/img/taytay2.png')}}" width="170px" class="text-center" alt=""></div> -->
                <div class=""><a href="" class="btn btn-secondary cara-bayar1">Cara Bayar?</a></div>
                <div id="qrcode" class="text-center qrcode1">

                </div>
                <p class="font-weight-bold text-center">NMID: ID1022227487280</p>
                <!-- <p class="font-weight-bold text-center">TayTay ID</p> -->
                <div class="logo-taytay2"><img src="{{ asset('asset/img/taytay2.png')}}" width="170px" class="text-center" alt=""></div>
                <p class="font-weight-bold text-center">Harga : <span class="text-dark font-weight-bold" id="modal_harga_qris"></span></h6>
                <p class="text-center">Segera Bayar Sebelum expired: <span id="modal-timer" class="text-dark font-weight-bold"></span> </p>
                <p class="text-center">Ada Kendala? <span><a href="">Hubungi CS klik disini</a></span></p>
                
            </div>
            <div class="modal-footer">
                <button type="button" id="bayarakhirqris" class="btn btn-qris1">Check Status Bayar</button>
            </div>
        </div>
    </div>
</div>
@stop