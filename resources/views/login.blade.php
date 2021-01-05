<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Werefa Admin | Log in</title>

  <!-- Google Font: Source Sans Pro -->

  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/load.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/alert.css">

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

<body  class="hold-transition login-page">
    
  <div class="login-box">
    <div class="login-logo">
      <a onclick="load();" href="/"><b>Werefa</b>Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to manage</p>


        <div class="input-group mb-3">
          <input id="username" type="email" class="form-control" placeholder="username">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <label id="nameval" style="color:red; visibility:hidden;"></label>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="Password">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <label id="password1" style="color:red; visibility:hidden;"></label>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button onclick="load();" id="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>



        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>

  <script>
    $(document).ready(function () {

      $('#login').click(function () {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var username = $("#username").val();
        var password = $("#password").val();
        var lablename = document.getElementById("nameval");
        var lablephone = document.getElementById("password1");

        if (username == "" && password == "") {
          var load = document.getElementById("wrapper");
          load.style.display = 'none';
          lablename.style.visibility = "visible";
          $("#nameval").html("Requierd!");
          lablephone.style.visibility = "visible";
          $("#password1").html("Requierd!");
        } else if (username == "") {
          var load = document.getElementById("wrapper");
          load.style.display = 'none';
          lablename.style.visibility = "visible";
          $("#nameval").html("Requierd!");
        } else if (password == "") {
          var load = document.getElementById("wrapper");
          load.style.display = 'none';
          lablephone.style.visibility = "visible";
          $("#password1").html("Requierd!");
        } else {

          $.ajax({
            type: "POST",
            url: "/login",
            data: {
              username: username,
              password: password
            },
            cache: false,

            success: function (html) {
              if (html == 1) {
                window.location = "/home";
              } else {
                var load = document.getElementById("wrapper");
                load.style.display = 'none';
                var al = document.getElementById("werefaAlert");
                al.style.display = "block";
                $("#mesage").html("username or password is incorrect!");

              }

            },
            error: function (data) {
              alert(data);
            }
          })
        }

      });

    });

  </script>

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
  @include('loder')

</body>

</html>
