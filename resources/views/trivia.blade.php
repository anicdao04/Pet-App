<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trivia - Noah's Ark</title>
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
    
    <style>
        .accordion-button{
            padding:1.5rem 1.25rem !important;
        }
    </style>
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
                <a href="adopt" class="nav-item nav-link">Adopt</a>
                <a href="trivia" class="nav-item nav-link active">Trivia</a>
                <a href="/login" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5" target="blank">Login <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->





    <!-- About Start -->
    <div class="container py-5 px-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Questions and Answer</h6>
                <h1 class="display-5 text-uppercase mb-0">Trivia</h1>
            </div>


    <div class="bg-light p-0">
        <ul class="nav nav-pills justify-content-between mb-0" id="pills-tab" role="tablist">
            <li class="nav-item w-25" role="presentation">
                <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Animal Care</button>
            </li>
            
            <li class="nav-item w-25" role="presentation">
                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">Laws</button>
            </li>

            <li class="nav-item w-25" role="presentation">
                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false">Breeds Dogs and Cats</button>
            </li>

            <li class="nav-item w-25" role="presentation">
                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="false">Rabies Awarenes</button>
            </li>

        </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                        
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="px-5 py-5" style="background-color:#F3F3F3 !important;">
                                @foreach($trivias as $key => $data)
                                @if(($data->category)=='Animal Care')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one{{$data->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span class="text-danger mx-1">Trivia #{{$key + 1}} </span> - <span class="text-uppercase mx-2">{{$data->title}}</span>
                                    </button>
                                    </h2>
                                        <div id="one{{$data->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">{!!$data->description!!}</div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                        
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="px-5 py-5" style="background-color:#F3F3F3 !important;">
                                @foreach($trivias as $key => $data)
                                @if(($data->category)=='Laws')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one{{$data->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span class="text-danger mx-1">Trivia #{{$key + 1}} </span> - <span class="text-uppercase mx-2">{{$data->title}}</span>
                                    </button>
                                    </h2>
                                        <div id="one{{$data->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">{!!$data->description!!}</div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                        
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="px-5 py-5" style="background-color:#F3F3F3 !important;">
                                @foreach($trivias as $key => $data)
                                @if(($data->category)=='Breeds')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one{{$data->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span class="text-danger mx-1">Trivia #{{$key + 1}} </span> - <span class="text-uppercase mx-2">{{$data->title}}</span>
                                    </button>
                                    </h2>
                                        <div id="one{{$data->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">{!!$data->description!!}</div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                        
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="px-5 py-5" style="background-color:#F3F3F3 !important;">
                                @foreach($trivias as $key => $data)
                                @if(($data->category)=='Rabies Awareness')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one{{$data->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span class="text-danger mx-1">Trivia #{{$key + 1}} </span> - <span class="text-uppercase mx-2">{{$data->title}}</span>
                                    </button>
                                    </h2>
                                        <div id="one{{$data->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">{!!$data->description!!}</div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
    </div>




        <!-- <div class="row">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="px-5 py-5" style="background-color:#F3F3F3 !important;">
                 
                    
                    @foreach($trivias as $key => $data)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one{{$data->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="text-danger mx-1">Trivia #{{$key + 1}} </span> - <span class="text-uppercase mx-2">{{$data->title}}</span>
                            
                        </button>
                        </h2>
                        <div id="one{{$data->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">{!!$data->description!!}</div>
                        </div>
                    </div>
                    
               
                    @endforeach
                    
                   
                    </div>
                </div>
            </div> -->
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