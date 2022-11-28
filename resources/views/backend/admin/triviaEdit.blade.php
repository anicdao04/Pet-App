
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Trivia | PetPal</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- TinyMCE -->
  <script src="https://cdn.tiny.cloud/1/ahlrebx1gowrklos5yhv73cr16nfgdugkhjnd6iqtytdjrt9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
            <a href="{{route('pet.index')}}" class="nav-link">
              <i class="nav-icon fa fa-dog"></i>
              <p>Pets</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('trivia.index')}}" class="nav-link active">
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
                <h3>Edit Trivia</h3>
                <small>Please fill in this form to Update this trivia.</small>
            </div>
            
         
            <form action="{{ url('admin/trivia/update/'.$trivia->id) }}" method="post">
            @csrf
            @method('PUT')
                <div class="col-10 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Trivia Information</h3>
                            <div class="card-tools">                    
                             
                            </div>
                        </div>
                        <div class="card-body px-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="class">Category</label>
                                        <select name="category" class="form-control" required>
                                              <option value="Animal Care">Animal Care</option>
                                              <option value="Laws">Laws</option>
                                              <option value="Breeds">Breeds</option>
                                              <option value="Rabies Awareness">Rabies Awareness</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="class">Header</label>
                                        <input type="text" name="header" value="{{ $trivia->title }}" class="form-control" required>  
                                        @if($errors->has('header'))
                                            <span class="text-danger">
                                                {{ $errors->first('header')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="class">Content</label>
                                        <textarea rows="5" name="description" class="form-control">{{$trivia->description}}</textarea>  
                                        @if($errors->has('content'))
                                            <span class="text-danger">
                                                {{ $errors->first('content')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                               

                               
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mr-1">Update</button>
                    <a href="{{ route('trivia.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>

         

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


  <!-- TinyMCE -->
  <script src="https://cdn.tiny.cloud/1/ahlrebx1gowrklos5yhv73cr16nfgdugkhjnd6iqtytdjrt9/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>

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
