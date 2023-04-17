<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tay Tay ID</title>
    <link rel="icon" type="image/png" href="{{ asset ('asset/img/logogram 3.png')}}" sizes="300x300" />
    <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital@1&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vollkorn">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/Features-Boxed.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/owl/owl-carousel.css')}}">
</head>

<body data-spy="scroll" data-target="#navbar-atas">
    <nav class="navbar navbar-light navbar-expand-md fixed-top font-weight-bold bg-kuning" id="navbar-atas">
        <div class="container">
            <a class="navbar-brand" href="awal">
                <img src="{{ asset('asset/img/TayTayID2.png')}}" width="50" class="d-inline-block align-middle" alt="" loading="lazy">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#checkid">Check ID</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#harga">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pembayaran">payment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        @yield('navbar')
    </div>
    <section class="bg-hitam" id="footer">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="col-md-8 col-12 text-center">
                        <a href="">
                            <img src="{{ asset('asset/img/logogram 1 white.png')}}" width="170px" alt="">
                        </a>
                        <div class="col-md-8 col-12">

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pt-3">
                    <h5 class="Abfoll1 mb-2"> <strong>About</strong></h5>
                    <h5 class="mb-3 Abfoll1 "> <strong>Follow Us</strong></h5>
                    <div class="text">
                        <a href="https://www.facebook.com/profile.php?id=100087627216226"><i class="fab fa-facebook fa-2x icon1 soc-item soc-item1 text-center "></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100087627216226"><i class="fab fa-twitter fa-2x icon1 ml-3 soc-item soc-item1 "></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100087627216226"><i class="fab fa-instagram fa-2x icon1 ml-3 soc-item soc-item1"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pt-3">
                    <h5 class="Abfoll2 mb-2"><strong>No.Telepon:087810249099</strong></h5>
                    <h5 class="Abfoll2 mb-2"><strong>Email:taytayidshop@gmail.com</strong></h5>
                    <h5 class="Abfoll2 mb-2"><strong>Alamat:Jl.Kampung</strong></h5>
                </div>
                <div class="col-6 col-md-6 py-3 pvc">
                    <h5 class="pvc2"><strong>Pemasaran dan Kemitraan</strong></h5>
                    <h5 class="pvc2"><strong>Syarat & Ketentuan</strong></h5>
                    <h5 class="pvc2"><strong>Kebijakan privasi</strong></h5>
                </div>
            </div>
    </section>
    </script>
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-dyxjStmon7dw4kXe"></script>
    <script src="{{ asset('asset/js/jquery.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('asset/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/fontawesome.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="{{ asset('asset/js/script.js')}}"></script>
    <script src="{{ asset('asset/js/autoNumeric.js')}}"></script>
    <script src="{{ asset('/js/jquery.priceformat.min.js')}}"></script>
    <script src="{{ asset('asset/owl/owl-carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.3/src/easytimer.min.js"></script>
    
    <script>
        $('.deskripsiitem').priceFormat({
            prefix: 'Rp',
            centsLimit: 0,
            thousandsSeparator: '.'
        });
    </script>
    <script>
        $('.owl-carousel1').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

</body>

</html>