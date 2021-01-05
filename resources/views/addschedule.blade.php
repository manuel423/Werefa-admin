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
  <link rel="stylesheet" href="css/datatable.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/tablestyle.css">
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/alert.css">
  <link rel="stylesheet" href="css/load.css">
  <!-- overlayScrollbars -->
  <script>
	
  function load(){
     var load=document.getElementById("wrapper");
      load.style.display='block';
         
     }
            
function colose() {
    var load = document.getElementById("werefaAlert");
    load.style.display = "none";
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
          <a onclick="load();"  href="/home" class="nav-link">Home</a>
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
              <a onclick="load();" href="/movieinfo" class="nav-link active">
                <i class="nav-icon fas fa-th"></i>
                <p style="color: white;">
                Add Schedule
                  
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a onclick="load();" href="/sellticket" class="nav-link ">
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
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
        <div style="display: none;">
        @foreach($screens as $screen)
        <h6 id="nos">{{$screen->Screen}}</h6>
        @endforeach
      </div>
      <!-- Main content -->
      <section class="listings-content-wrapper section-padding-100">

      
        <div style="width: 90%;" class="container-fluid">
          <!-- Small boxes (Stat box) -->


          <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Movie <b>Schedule</b></h2>
          </div>
          <div class="col-sm-6">
            <a onclick="load();" id="delet" class="btn btn-danger" data-toggle="modal"><i
                class="material-icons">&#xE15C;</i> <span>Delete</span></a>
          </div>
        </div>
      </div>
        
        <table id="table" class="table table-striped table-hover">
        <thead>
          <tr>
          <th>
              <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
            <label for="selectAll"></label>
              </span>
        </th>
        <th>Movie</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($movieinfo as $m)
          <tr>
          <td>
              <span class="custom-checkbox">
                <input type="checkbox" class="checkbox" name="ids" value="{{$m->id}}">
                <label for="checkbox1"></label>
              </span>
        </td>
            <td>{{$m->Movie}}</td>
            <?php 
                $days=json_decode( $m->Schedule, true);
            ?>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Monday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                @endforeach
            </td>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Tuesday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                
                @endforeach
            </td>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Wednesday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                
                @endforeach
            </td>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Thursday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                @endforeach
            </td>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Friday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                @endforeach
            </td>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Saturday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                @endforeach
            </td>
            <td>
            @foreach($days as $day=>$time)
                @if($day=='Sunday')
                    <?php $size=count($time);?>
                    
                    @for($i=0; $i<$size; $i++)
                        {{$time[$i][0]}}
                    @endfor
                @endif
                @endforeach
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
      <h3 align="center">Add Day and Time Schedule</h3>
      <div class="row">

      <div class="col-12 col-md-6 col-xl-4">
      <br><br><select style="width: 50%; height: 50px;" align="center" id="opp" class="selects">
                    <option  value="" disabled selected hidden>Choose Movie</option>
                    @foreach($movie as $m)
                    <option value="{{ $m->MovieName }}">{{ $m->MovieName }}</option>
                    @endforeach
                </select>
      </div>


            <div class="col-12 col-md-6 col-xl-4">
           
                <div style="width: fit-content;"  class="single-featured-property mb-50">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                            <img id="movieimg" style=" min-height: 300px; max-height: 300px; "
                                src="img/movie.jpg" alt="">
                        </div>
                    <!-- Property Content -->   
                </div>
            </div>
      </div>
            <section class="listings-content-wrapper section-padding-100">
   <div style="width: 60%; margin-left:20%;">

<a data-toggle="collapse" href="#monday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Monday</h3>
 </div>
</a>
<div style="background-color: white;" id="monday" class="panel-collapse collapse">
 <div class="mschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="mondaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="mremove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>

<a data-toggle="collapse" href="#Tuesday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Tuesday</h3>
 </div>
</a>
<div style="background-color: white;" id="Tuesday" class="panel-collapse collapse">
 <div class="tuschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="tuesdaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="turemove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>

<a data-toggle="collapse" href="#Wednesday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Wednesday</h3>
 </div>
</a>
<div style="background-color: white;" id="Wednesday" class="panel-collapse collapse">
 <div class="wschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="wednesdaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="wremove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>
<a data-toggle="collapse" href="#Thursday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Thursday</h3>
 </div>
</a>
<div style="background-color: white;" id="Thursday" class="panel-collapse collapse">
 <div class="thschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="thursdaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="thremove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>
<a data-toggle="collapse" href="#Friday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Friday</h3>
 </div>
</a>
<div style="background-color: white;" id="Friday" class="panel-collapse collapse">
 <div class="fschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="fridaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="fremove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>
<a data-toggle="collapse" href="#Saturday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Saturday</h3>
 </div>
</a>
<div style="background-color: white;" id="Saturday" class="panel-collapse collapse">
 <div class="saschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="saturdaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="saremove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>
<a data-toggle="collapse" href="#Sunday">
 <div
   style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
   <h3 align="center" style="color: white;">Sunday</h3>
 </div>
</a>
<div style="background-color: white;" id="Sunday" class="panel-collapse collapse">
 <div class="suschedule">
   <h3 align="center">Time schedule</h3>
 </div>
 <button class="btn-success" id="sundaytime"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Add</button>
   <button class="btn-danger" id="suremove"
   style="margin-bottom: 5%; margin-right: 5%; float: right; ">Delete</button><br><br>

</div>

<button onclick="load();" align="center" id="post"
 style=" margin-left: 5%; background-color: black; color: white; width:10%; padding:1%;">submit</button>
</div>
       </div>
   </section>

          </div>
        </div>

          <!-- /.row -->
        </div><!-- /.container-fluid -->
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
  <script src="js/select2.min.js"></script>
  <script src="js/schedule.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="js/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)

  </script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->

  <!-- AdminLTE App -->
  <script src="js/adminlte.js"></script>
  <script  src="js/datatable.js"></script>
  <script src="js/active.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {

        

        $(".selects").select2();

    $('#opp').change(function () {
        
        var moviename = $(this).val();
        var path='img/moveis/'+moviename+'.jpg';
        $('#movieimg').attr("src",path);
        //alert(path);
        //img.src=path;

     });


      $('#table').DataTable();

      $('[data-toggle="tooltip"]').tooltip();

// Select/Deselect checkboxes
var checkbox = $('table tbody input[type="checkbox"]');
$("#selectAll").click(function () {
  if (this.checked) {
    checkbox.each(function () {
      this.checked = true;
    });
  } else {
    checkbox.each(function () {
      this.checked = false;
    });
  }
});
checkbox.click(function () {
  if (!this.checked) {
    $("#selectAll").prop("checked", false);
  }
});

$("#delet").click(function () {
            var no=$("input[name='ids']:checked").length;
            if(no>0){
                var favorite = [];
              $.each($("input[name='ids']:checked"), function(){
                  favorite.push($(this).val());
              });

              $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //load.style.display = "block";
    $.ajax({
        type: "POST",
        url: "/delete",
        data: {
            movieinfo_id: favorite,
        },
        cache: false,

        success: function (html) {
          var load=document.getElementById("wrapper");
               load.style.display='none';
            window.location.reload();
            
        },
    });

            }else{
              var load=document.getElementById("wrapper");
               load.style.display='none';
                  var al = document.getElementById("werefaAlert");
                  al.style.display = "block";
                  $("#mesage").html("Selecte first!");
            }
            
});

            

});
   

  </script>
@include('loder')

<div id="werefaAlert">
    <section class="listings-content-wrapper section-padding-100">
      <div class="container">
        <div
          style="min-width: 330px; max-width: 500px; background-color:#fff; padding-left:5px; padding-right:5px; border-radius: 0.7rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1); ">
          <h4 align="center" style="color:black; font-size:40px; padding:10px;">Coution</h4>

          <div id="mesage"></div>

          <div class="form-group">
            <input onclick="colose()" id="second" type="submit" name="submit" value="OK" class="button " />

          </div>
        </div>
      </div>

    </section>
  </div>
</body>

</html>
