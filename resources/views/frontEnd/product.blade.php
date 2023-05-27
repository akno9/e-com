<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Détails Produit</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front\lib\owlcarousel\assets\owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front\css\style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://fr-fr.facebook.com/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="https://twitter.com/?lang=fr">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.instagram.com/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="https://www.youtube.fr/">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Comm</h1>
                </a>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{url('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">Panier</span>
                </a>
                <a href="{{url('checkout')}}" class="btn border">
                    <i class="fa fa-times text-primary"></i>
                    <span class="badge">Commande</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
        <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto py-0">
                            @guest
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            @endif
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                            @endif
                            @else
                                <a href="{{url('/dashboard')}}" class="nav-item nav-link">{{ Auth::user()->name }}</a>
                                <a class="nav-item nav-link"  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        @endguest
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img class="w-100 h-100" src="{{asset('assets/uploads/product/'.$product->image)}}" alt="Image">
            </div>

            <div class="col-lg-7 pb-5  prodData">
                <input type="hidden" value="{{$product->id}}" class="prodId">
                <h3 class="font-weight-semi-bold">{{$product->nom}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        @if($product->qte >1)
                        ---
                        @else
                        Produit en rupture de stock
                        @endif
                    </div>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{$product->prix_vente}} DH</h3>
                <h6><del>{{$product->prix_orig}} DH</del></h6>
                <p class="mb-4">{{$product->mini_desc}}</p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="quantity" class="form-control bg-secondary qty-input text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary addToCartBtn px-3"><i class="fa fa-shopping-cart mr-1"></i> Ajouter au panier</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Partager:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="https://fr-fr.facebook.com/">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="https://twitter.com/?lang=fr">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="https://www.instagram.com/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-dark px-2" href="https://www.pinterest.fr/">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">{{$product->nom}}</h4>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Produits de Qualité</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Livraison Gratuite</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Retour sous 14 jours</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Support 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Comm</h1>
                </a>
                <p>FAITES UN BON SHOPPING \(.^^)/</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ecomm@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+ 212 67 89 01 23 45</p>
            </div>
        </div>
    </div>
    <!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('front\mail\jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('front\mail\contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front\js\main.js') }}"></script>
    <!-- Template Javascript pour récupérer les données -->
    <script>
        $(document).ready(function(){
            $('.addToCartBtn').click(function(e){
                e.preventDefault();
                var prod_id=$(this).closest('.prodData').find('.prodId').val();
                var prod_qty=$(this).closest('.prodData').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method:"POST",
                    url: "/add-to-cart",
                    data:{
                        'prod_id':prod_id,
                        'prod_qty':prod_qty
                    },
                    success: function(response){
                        alert(response.status);
                    }
                })
            });
        })
    </script>

</body>

</html>
