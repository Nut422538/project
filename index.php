<?php
 if (!isset($_GET['user'])){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="images/icons/logo-pttep.ico"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home-Project</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="engine0/style.css" />
  <!-- button toggle -->
  <link rel="stylesheet" type="text/css" href="button-toggle/css/bootstrap2-toggle.min.css" />
  <!-- <link rel="stylesheet" type="text/css" href="button-toggle/css/bootstrap2-toggle.css  " /> -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src = "dist/js/site_bar.js"></script>
  <!-- google font -->
  <link href ="https://fonts.googleapis.com/css?family=Kanit|Noto+Sans&display=swap" rel="stylesheet">
  
</head> 
<style>
    * {
      font-family: 'Kanit', sans-serif;
      font-style: Thin;
    }
    body {
      font-family: 'Kanit', sans-serif;
      /* font-size: 16px; */
      background-image: url('./data0/images/Udon09.png');
      background-size: 100%;
      background-repeat: no-repeat;
      /* padding-top: 8%; */
    }
    #map-and-img-1 {
      padding: 0px 10px 0px 0px;
    }
    #map-and-img-2 {
      padding: 0px 0px 0px 10px;
    }
    @media only screen and (max-width: 960px) {
      /* For mobile phones: */
      #map-and-img-1 {
        padding: 0px 0px 10px 0px;
      }
      #map-and-img-2 {
        padding: 10px 0px 0px 0px;
      }
    }
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    input:checked + .slider {
      background-color: #a31640;
    }
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    .slider.round:before {
      border-radius: 50%;
    }
    /* Device status active and inactive show color  */
    .active-color {
      color: #2f9605;
      -webkit-animation-name: acive_co; 
      -webkit-animation-duration: 0.5s; 
      animation-name: acive_co;
      animation-duration: 0.5s;
    }
    .inactive-color {
      color: #8d8b8c;
      -webkit-animation-name: inacive_co; 
      -webkit-animation-duration: 0.5s; 
      animation-name: inacive_co;
      animation-duration: 0.5s;
    }
    .box-active {
      color: #000000;
      padding-top : 3px;
      padding-left : 10px;
      padding-right : 10px;
      border-radius : 4px;
      opacity: 0.9;
      background-color: #2f9605;
      -webkit-animation-name: box_atcive_co; 
      -webkit-animation-duration: 0.5s; 
      animation-name: box_atcive_co;
      animation-duration: 0.5s;
    }
    @-webkit-keyframes box_atcive_co {
      from {background-color: #2f9605;}
      to {background-color: #50ac17;}
    }

    @keyframes box_atcive_co {
      from {background-color: #2f9605;}
      to {background-color: #50ac17;}
    }
    .box-inactive {
      color: #000000;
      padding-top : 3px;
      padding-left : 10px;
      padding-right : 10px;
      border-radius : 4px;
      opacity: 0.9;
      background-color: #8d8b8c;
      -webkit-animation-name: box_inatcive_co; 
      -webkit-animation-duration: 0.5s; 
      animation-name: box_inatcive_co;
      animation-duration: 0.5s;
    }
      @-webkit-keyframes box_inatcive_co {
      from {background-color: #aca9aa;}
      to {background-color: #8d8b8c;}
    }

    @keyframes box_inatcive_co {
      from {background-color: #aca9aa;}
      to {background-color: #8d8b8c;}
    }
    @-webkit-keyframes acive_co {
      from {color: #2f9605;}
      to {color: #50ac17;}
    }

    @keyframes acive_co {
      from {color: #2f9605;}
      to {color: #50ac17;}
    }
    @-webkit-keyframes inacive_co {
      from {color: #aca9aa;}
      to {color: #8d8b8c;}
    }

    @keyframes inacive_co {
      from {color: #aca9aa;}
      to {color: #8d8b8c;}
    }
  /* end  */
  </style>
<body class="sidebar-mini wysihtml5-supported fixed skin-blue">
<div style="font-weight:400;">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo" style = "background-color:#c64444;">
        <span class="logo-mini"><b>SVG</b></span>
        <span class="logo-lg"><b>SVG</b></span>
        
      </a>
      <nav class="navbar navbar-static-top" style = "opacity: 10;">
        <!-- Sidebar toggle button-->
        <a href="#" class="nav sidebar-toggle " data-toggle="push-menu" role="button" style = "" >
          <span class="sr-only">Toggle navigation</span>
        </a>
        
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- เลือกProject -->
            <li class="dropdown notifications-menu">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="fa fa-building"></i>
                <span class="label label-warning">1</span>
                <span class="hidden-xs">เลือกProject</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header" style="background-color: #2d98da;">เลือกProject</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="">
                        <i class="fa  fa-circle-o" style = "color:#ec4174;"></i>Project1
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <!-- Sign out -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/admin.png" class="user-image" alt="User Image">
                <span class="hidden-xs"> [<?php echo $_GET['user'];?>]</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header" style ="height: 140px; background-color:rgb(108, 108, 108);">
                  <img src="images/admin.png" class="img-circle" alt="User Image">

                  <p>
                    <i class="fa fa-user"></i> [<?php echo $_GET['user'];?>]
                    <!-- <small>[<?php echo $_GET['user'];?>]</small> -->
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                  </div>
                  <div class="pull-right">
                    <a href="login.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar" >
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <li class="active treeview">
            <a>
              <i class="fa fa-dashboard"></i> <span style = "font-size:16px;"><strong>Home</strong></span>
            </a>
          </li>


          <!-- menu-open -->
          <li class="treeview menu-open" id = "menu-name-for-site">
            <a href="#">
              <i class="fa fa-file-text-o"></i>
              <span style="font-size:16px;"><strong>Edit Project</strong></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu" style="display: block;" id = "menu-for-side">
              <li>
                <a href="edit_svg.php?user=<?php echo $_GET['user']?>" style="font-size:16px;">
                  <i class="fa fa-circle-o" style= "color: #b593f6;"></i>
                  SVG
                </a>
              </li>
              <li>
              <!-- <a href="index.php?token=<?php echo $_GET['token']?>">
              <i class="fa fa-dashboard"></i> <span style = "font-size:16px;"><strong>DASHBOARD</strong></span> -->
            </a>
                <a href="edit_node_red.php?user=<?php echo $_GET['user']?>" style="font-size:16px;">
                  <i class="fa fa-circle-o" style= "color: #b593f6;"></i>
                  Node-Red
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper" style="min-height: 100%;">
      <section class="content">
        <div class="row">
          <section class="col-lg-12">
            <div class="box box-primary">
              <div class="box-header">
                <i class="fa fa-star"></i>
                <h1 class="box-title" style=" font-size: 1.8em;padding-right:2%;">Upload</h1>
              </div>
              <div class="box-body">
                <div class="container-fluid">
                  <div class="row">
                    <center>
                      <form method="post" enctype="multipart/form-data">
                        Upload SVG:
                        <input type="file" name="file">
                        <input type="submit" name="submit" value="Upload">
                      </form>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <iframe src="http://34.69.243.34/iot/demo/station1.php" frameborder="0" height = '600px' width = '100%' id=''></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>

    <footer class="main-footer">
      <strong>DEAWARE TEAM</strong>
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- <script type="text/javascript" src="engine0/wowslider.js"></script>
<script type="text/javascript" src="engine0/script.js"></script> -->
<!-- button toggle -->
<script type="text/javascript" src="button-toggle/js/bootstrap2-toggle.min.js"></script>
<!-- <script type="text/javascript" src="button-toggle/js/bootstrap2-toggle.js"></script> -->
<!-- Google Maps -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA60weYi_4Yrt6C6GEiiiUegYnPBfWXaBk&callback=initMap" async defer></script> -->

<!-- underscore javascript -->
<script type="text/javascript" src="dist/js/underscore-min.js"></script>
<script src="module/checkToken.js"></script>

<!-- moment datetime -->
<script src = "dist/js/moment.js"></script>


<!-- highchart javascript -->
<script src="dist/js/highcharts.js"></script>

<!-- data mock -->
<script src="api/data.js"></script>

</body>
</html>
