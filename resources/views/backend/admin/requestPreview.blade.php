
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | PetPal</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .content-wrapper .content{
      padding: .5rem 1rem !important;
    }
    .request-details{
        font-size: 16px; 
        background-color:#f4f6f9; 
        padding:6px 8px; 
        border:1px solid #d7d8db;
        margin-bottom: 0px !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">My Account</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout.perform')}}" class="nav-link">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <!-- <img src="{{ asset('dist/img/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PetPal</span><br> -->

      <img src="{{ asset('img/backend-logo.png') }}" class="brand-image" style="opacity: .8"><br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('pet.index')}}" class="nav-link">
              <i class="nav-icon fa fa-dog"></i>
              <p>Pets</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('trivia.index')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>Trivia</p>
            </a>
          </li>


          <div class="mt-3">
          <label>Notification</label>
          </div>  


          <li class="nav-item">
            <a href="{{route('request.index')}}" class="nav-link active">
              <i class="nav-icon fa fa-clipboard-list"></i>
              <p>Request</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



<!-- ################## Content ################## -->
<div class="content-wrapper pt-3">
<!-- Main content -->
<section class="content">
        <div class="container-fluid">
            <div class="mb-3">
                <h3>Adoptors' Request Information</h3>
                <small><span class="text-primary">Adaptors' Request</span> | Preview</small>
            </div>
            
            <div class="row">
                <!-- Info boxes -->
                <div class="col-12 px-5 py-3">
                <h4>Adoptor Details</h4>
                    <div class="row px-4 py-4 bg-white" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%); border-radius: 0.25rem;">
                        <div class="col-md-4 col-sm-12 px-3">
                            <div class="form-group">
                                <label for="class">Adoptor's Name</label>
                                <p class="request-details">{{ $adaptor->adopt_name}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 px-3">
                            <div class="form-group">
                                <label for="class">Address</label>
                                <p class="request-details">{{ $adaptor->adopt_address}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 px-3">
                            <div class="form-group">
                                <label for="class">Contact No.</label>
                                <p class="request-details">{{ $adaptor->adopt_contact}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 px-3">
                            <div class="form-group">
                                <label for="class">Email Address</label>
                                <p class="request-details">{{ $adaptor->adopt_email}}</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 px-3">
                            <div class="form-group">
                                <label for="class">Message</label>
                                <p class="request-details">{{ $adaptor->message}}</p>
                            </div>
                        </div>
                        
                    </div> 
                </div> 
                <!--End Info boxes -->        
            </div> <!-- /row -->   

            <div class="row px-0 py-3">
                <div class="col-5 px-5 py-3">
                    <div class="row px-4 py-4 bg-white" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%); border-radius: 0.25rem;">
                        <img src="{{ asset('storage/images/'.$adaptor->pet_img) }}" class="img-fluid">
                    </div>
                </div>

                <div class="col-7 px-5 py-3">
                    <div class="row px-4 py-4 bg-white" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%); border-radius: 0.25rem;">
                    <div class="col-md-6 col-sm-12 px-3">
                            <div class="form-group">
                                    <label for="class">Pet Name</label>
                                    <p class="request-details">{{ $adaptor->pet_name}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 px-3">
                                <div class="form-group">
                                    <label for="class">Category</label>
                                    <p class="request-details">{{ $adaptor->pet_category}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 px-3">
                                <div class="form-group">
                                    <label for="class">Breed</label>
                                    <p class="request-details">{{ $adaptor->pet_breed}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 px-3">
                                <div class="form-group">
                                    <label for="class">Age</label>
                                    <p class="request-details">{{ $adaptor->pet_age}}</p>
                                </div>
                            </div>
                            
                    </div>
                    @if(($adaptor->status)==0)
                      <a href="{{url('admin/request/approve/'.$adaptor->id)}}" class="btn btn-primary mt-3 mr-1">Accept Request</a>
                      <a href="{{url('admin/request')}}" class="btn btn-secondary mt-3">Back</a>
                    @elseif(($adaptor->status)==1)
                      <a href="{{url('admin/request/disapprove/'.$adaptor->id)}}" class="btn btn-danger mt-3 mr-1">Disapprove</a>
                      <a href="{{url('admin/request')}}" class="btn btn-secondary mt-3">Back</a>
                    @endif
                </div>

            </div> <!-- /row --> 


        </div> <!-- /container-fluid -->
    </section> <!-- /section -->




</div>
<!-- ################ End Content ################ -->


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@if(Session::has('pets_created'))
    <script>
        toastr.info("{!! Session::get('pets_created') !!}");
    </script>
@elseif(Session::has('pets_updated'))
    <script>
        toastr.success("{!! Session::get('pets_updated') !!}");
    </script>
@endif


</body>
</html>
