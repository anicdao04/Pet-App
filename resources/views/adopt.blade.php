<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Adoption - Noah's Ark</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-0">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-2 text-primary me-3"></i>
                    <div class="text-start">
                        <span>Irung St., Brgy. Tabun, Mabalacat City</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-0">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-2 text-primary me-3"></i>
                    <div class="text-start">
                        <span>info@example.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-0">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-2 text-primary me-3"></i>
                    <div class="text-start">
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="/" class="navbar-brand ms-lg-5">
        <img src="{{ asset('img/banner-logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link">Home</a>
                <a href="adopt" class="nav-item nav-link active">Adopt</a>
                <a href="trivia" class="nav-item nav-link">Trivia</a>
                <a href="/login" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5" target="blank">Login <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->





    <!-- About Start -->
    <div class="container py-5 px-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">For Adoption</h6>
                <h1 class="display-5 text-uppercase mb-0">Pets Need Cares</h1>
            </div>

            <div class="row">
                    @foreach($pets as $data)
                    <div class="col-lg-4 mb-5 mb-lg-0" style="min-height: 500px;">
                        <div class="row g-0 bg-light overflow-hidden">
                                <div class="col-6 col-sm-6 h-100"> 
                                    <img class="img-fluid h-100" src="{{ asset('storage/images/'.$data->image) }}" style="object-fit:cover; height:250px !important;">
                                </div>
                                <div class="col-6 col-sm-6 h-100 d-flex flex-column justify-content-center">
                                    <div class="p-4">
                                        <div class="mb-4">
                                            <small class="me-3"><i class="bi bi-bookmarks me-2"></i>{{$data->breed}}</small><br>
                                            <small><i class="bi bi-calendar me-2"></i>{{ \Carbon\Carbon::parse($data->created_at)->format('m/d/Y')}}</small>
                                        </div>
                                        <h5 class="text-uppercase mb-3">{{$data->name}}</h5><br>
                                        <a class="text-primary text-uppercase" href="pet/id/{{$data->id}}">Apply for Adoptoin <i class="bi bi-chevron-double-right"></i></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
    <!-- About End -->
    

    

    <!-- Footer Start -->
        
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">Noah's Ark</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>