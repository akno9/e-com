<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Panier</title>
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


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Panier</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th></th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Retirer</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php $total=0; @endphp
                        @foreach($cartitems as $item)
                            <tr>
                                <td class="align-middle"><img src="{{asset('assets/uploads/product/'.$item->products->image)}}" alt="" style="width: 50px; height: 50px;"></td>
                                <td class="align-middle">{{$item->products->nom}}</td>
                                <td class="align-middle">{{$item->products->prix_vente}} DH</td>
                                <td class="align-middle">{{$item->prod_qte}}</td>
                                </td>
                                @php $soustotal=$item->products->prix_vente * $item->prod_qte; @endphp
                                <td class="align-middle">{{$soustotal}} DH</td>
                                <td class="align-middle prodData">
                                    <input type="hidden" value="{{$item->products->id}}" class="prodId">
                                    <button class="btn btn-sm btn-primary delete-cart-item"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            @php $total=$total+$soustotal; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Chekout</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{$total}} DH</h5>
                        </div>
                        <a href="{{url('/checkout')}}" class="btn btn-block btn-primary my-3 py-3">Valider</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

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

    <script>
        $(document).ready(function(){
            $('.delete-cart-item').click(function(e){
                e.preventDefault();
                var prod_id=$(this).closest('.prodData').find('.prodId').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method:"POST",
                    url: "/delete-cart-item",
                    data:{
                        'prod_id':prod_id,
                    },
                    success: function(response){
                        window.location.reload();
                        alert(response.status);
                    }
                })
            });
        })
    </script>
</body>

</html>
