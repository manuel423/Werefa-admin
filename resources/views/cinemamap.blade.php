<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Werefa Admin | Dashboard</title>
  <!-- Font Awesome -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.seat-charts.css">
    <link rel="stylesheet" href="css/interstyle.css">
    <link rel="stylesheet" href="css/alert.css">
  <link rel="stylesheet" href="css/load.css">
  <!-- overlayScrollbars -->
  <script>
	
  function load(){
     var load=document.getElementById("wrapper");
      load.style.display='block';
         
     }
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div id="preloader-active">
        <div class="preloaders d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                <img src="img/w.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a onclick="load();" href="/home" class="nav-link">Home</a>
        </li>
        
      </ul>
      <!-- Right navbar links -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a onclick="load();" href="/home" class="brand-link">
        <img src="img/w.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Werefa Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php $name=session()->get('cinema');?>
          <div class="info">
            <h5 style="color: white;" class="d-block">{{$name}}</h5>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a onclick="load();" href="/home" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p style="color: white;">
                  Report
                  <i class="right fas "></i>
                </p>
              </a>

            </li>
            <li class="nav-item">
              <a onclick="load();" href="/movieinfo" class="nav-link ">
                <i class="nav-icon fas fa-th"></i>
                <p style="color: white;">
                Add Schedule
                  
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a onclick="load();" href="/sellticket" class="nav-link active">
                <i class="nav-icon fas fa-copy"></i>
                <p style="color: white;">
                  Sell Ticket
                  <i class="fas right"></i>
                  
                </p>
              </a>

            </li>

            <li class="nav-item has-treeview">
              <a onclick="load();" href="/logout" class="nav-link ">
                <i class="nav-icon fas fa-copy"></i>
                <p style="color: white;">
                  Logout
                  <i class="fas right"></i>
                  
                </p>
              </a>

            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Seat Map</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Seat Map</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div	style="display: none;">	
	<select id="seatno">
				@foreach($soldSeats as $soldseat)
				<?php 
					$i=0;
					$seats[]=json_decode( $soldseat->Seat_id, true);
					
					?>
					@foreach($seats as $seat)
					<?php $size=count($seat);?>
						@for($i=0; $i<$size; $i++)
						<option value="{{$seat[$i]}}">{{$seat[$i]}}</option>
						@endfor
					@endforeach
                @endforeach
                @foreach($cinemasoald as $cinema)
				<?php 
					$i=0;
					$cseats[]=json_decode( $cinema->Seat_id, true);
					
					?>
					@foreach($cseats as $cseat)
					<?php $size=count($cseat);?>
						@for($i=0; $i<$size; $i++)
						<option value="{{$cseat[$i]}}">{{$cseat[$i]}}</option>
						@endfor
					@endforeach
				@endforeach
			</select>	
		
	</div>
      <!-- Main content -->
      <section  class="listings-content-wrapper section-padding-100">
        <h6 align="center">Screen {{$screen}} seat map</h6>
			<div id="legend"></div>
    <div class="wrappers">
    <div class="front">SCREEN</div><br><br>
    
			<div id="seat-map">
			</div>
    </div>
    <div class="booking-details">
                <h2>Booking Details</h2>
				<h3> Selected Seats (<span id="counter">0</span>):</h3><br><br>
				<input onclick="pay();" style="border-radius: 0.5rem; margin-left:25%; padding: 10px; align:center; background-color:black; color:white; width:100%; " type="button" value="Post Seat">

			</div>
    </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-pre
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="js/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)

  </script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="js/jquery.seat-charts.js"></script>
  <script src="js/cinemamaps/{{$cplace}}{{$screen}}.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.js"></script>
  <script src="js/active.js"></script>
  @include('loder')
</body>

</html>
