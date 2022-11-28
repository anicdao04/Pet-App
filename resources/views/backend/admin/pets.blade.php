
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
            <a href="{{route('pet.index')}}" class="nav-link active">
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
            <a href="{{route('request.index')}}" class="nav-link">
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
                <h3>Pets</h3>
                <small><span class="text-primary">Pets</span> | List</small>
            </div>
            
            <div class="row">
                <!-- Info boxes -->
                <div class="col-12 col-sm-5 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-default elevation-1"><i class="fas fa-dog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total No. of Pets</span>
                            <span class="info-box-number mt-0">
                            <span>{{ $pet_count }}</span>
                            </span>
                        </div> 
                    </div> 
                </div> 

                <!--End Info boxes -->

                <div class="col-12 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Pets</h3>
                            <div class="card-tools">                    
                                {!! $pets->links() !!}
                            </div>
                        </div>
                    
                        <div class="card-body p-0">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Breed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pets as $data)
                                <tr>
                                    <td><img src="{{ asset('storage/images/'. $data->image)}}" height="50px"></td> 
                                    <td>{{ $data->name}}</td> 
                                    <td>{{ $data->category}}</td> 
                                    <td>{{ $data->breed}}</td> 
                                <td>
                                    <div class="btn-group" role="group">
                                      <button id="btnGroupDrop1" type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="nav-icon fas fa-list mr-1"></i> Select
                                      </button>
                                      <div class="dropdown-menu" style="font-size: .875rem !important; min-width: 0px !important" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item"  href="{{ url('admin/pets/modify/'. $data->id) }}"><i class="nav-icon fas fa-edit mr-1"></i>Modify</a>
                                        <a class="dropdown-item"  href="{{url('admin/pets/preview/' . $data->id)}}"><i class="nav-icon fas fa-search mr-1"></i>Preview</a>
                                        <a class="dropdown-item"  href="{{url('admin/pets/delete/'.$data->id)}}"><i class="nav-icon fas fa-trash mr-1"></i> Delete</a>
                                      </div>
                                    </div>
                                </td>
                                </tr>            
                                @endforeach
                            </tbody>
                            </table>
                        </div>

                    </div>
                    <a href="{{ route('pet.create') }}" class="btn btn-primary">Create</a>
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
@elseif(Session::has('pets_deleted'))
    <script>
        toastr.error("{!! Session::get('pets_deleted') !!}");
    </script>
@endif


</body>
</html>
