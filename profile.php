<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIIT Management System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.css"> <!--Choose Skin-->
                  <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">    <!-- Main Header -->
    <a href="." class="logo">   <!-- Logo -->
      <span class="logo-mini"><b>SIIT</b></span>   <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-lg"><b>Management System<b></span>  <!-- logo for regular state and mobile devices -->
    </a>




    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

<!-- ==============================This is for Tab button================================================== -->
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


<!-- ==============================For The Notification Menu============================================================= -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['tier'])){
          ?>
          <!-- User Account Menu -->
          <!-- ==============================Make the notification Menu ============================================================ -->
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">1</span>
          </a>

          <ul class="dropdown-menu">
            <li class="header">You 1 Work to do</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> The broken quip @SIIT
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <?php
            if($_SESSION['tier'] == 'Admin'){
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">   <!-- Menu Toggle Button -->
              <img src="dist/img/user2-160x160.gif" class="user-image" alt="User Image">  <!-- The user image in the navbar-->
              <span class="hidden-xs"><?php echo $_SESSION['fname']; ?></span> <!-- hidden-xs hides the username on small devices so only the image appears. -->
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">  <!-- The user image in the menu -->
                <img src="dist/img/user2-160x160.gif" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['fname']; ?> - Ground Division Member

                </p>
              </li>

              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="member.php?mode=0">History</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="member.php?mode=1">Reserve</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="member.php?mode=2">Confirm</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <form action="profile.php?mode=2" method="post">
                    <input type="submit" class="btn btn-default btn-flat" value="Profile" />
                    <input type="hidden" name="mode" value=2>
                      <input type="hidden" name="full_name" value="<?php echo $_SESSION['fname']; ?>" >
                      <input type="hidden" name="user_num" value="<?php echo $_SESSION['user_no']; ?>" >
                      <input type="hidden" name="username" value="<?php echo $_SESSION['user_name']; ?>" >
                      <input type="hidden" name="password" value="<?php echo $_SESSION['user_pass']; ?>" >
                      <input type="hidden" name="email" value="<?php echo $_SESSION['e_mail']; ?>" >
                      <input type="hidden" name="user_tier" value="<?php echo $_SESSION['tier']; ?>" >
                      <input type="hidden" name="user_telephone" value="<?php echo $_SESSION['tele_number']; ?>" >
                  </form>
                </div>

                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Log Out</a>
                </div>
              </li>
            </ul>
          </li>
          <?php
            }
            else{
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">   <!-- Menu Toggle Button -->
              <img src="dist/img/user2-160x160.gif" class="user-image" alt="User Image">  <!-- The user image in the navbar-->
              <span class="hidden-xs"><?php echo $_SESSION['fname']; ?></span> <!-- hidden-xs hides the username on small devices so only the image appears. -->
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">  <!-- The user image in the menu -->
                <img src="dist/img/user2-160x160.gif" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['fname']; ?> - <?php echo $_SESSION['tier']; ?>
                </p>
              </li>

              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="member.php?mode=0">History</a>
                  </div>

                  <div class="col-xs-6 text-center">
                    <a href="member.php?mode=1">Reserve</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <form action="profile.php?mode=2" method="post">
                    <input type="submit" class="btn btn-default btn-flat" value="Profile" />
                    <input type="hidden" name="mode" value=2>
                      <input type="hidden" name="full_name" value="<?php echo $_SESSION['fname']; ?>" >
                      <input type="hidden" name="user_num" value="<?php echo $_SESSION['user_no']; ?>" >
                      <input type="hidden" name="username" value="<?php echo $_SESSION['user_name']; ?>" >
                      <input type="hidden" name="password" value="<?php echo $_SESSION['user_pass']; ?>" >
                      <input type="hidden" name="email" value="<?php echo $_SESSION['e_mail']; ?>" >
                      <input type="hidden" name="user_tier" value="<?php echo $_SESSION['tier']; ?>" >
                      <input type="hidden" name="user_telephone" value="<?php echo $_SESSION['tele_number']; ?>" >
                  </form>
                </div>

                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Log Out</a>
                </div>
              </li>
            </ul>
          </li>
          <?php
            }
          ?>
          <?php
            }
            else{
          ?>
          <li><a href="login.php">Log-in</a></li>
          <?php
            }
          ?>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel" style="margin-top:20px">
        <?php
          if(!isset($_SESSION['tier'])){
        ?>
        <center>
          <p><font color="white" size="5">Welcome Guest</font></p>
        </center>
        <?php
          }
          else{
        ?>
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.gif" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['fname']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>

        <?php
          }
        ?>
      </div>

      <!-- search form (Optional) -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
    -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <!-- ///////////////////////////////////      ADMIN MENU                /////////////////////////////////////////////////////// -->

                <?php
                  if(isset($_SESSION['tier'])){
                    if($_SESSION['tier'] == 'Admin'){
                ?>
                <li class="header"
                    style="margin-top:20px;padding-top:20px;padding-bottom:20px;font-size:20px"
                >
                <center>Admin Menu</center></li>
                <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                  <a href="#"><i class="fa fa-link"></i><span>Van Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>

                  <ul class="treeview-menu">
                    <li><a href="admin.php?mode=0">Add/Delete Van Data</a></li>
                  </ul>
                </li>


                <li class="treeview">
                  <a href=""><i class="fa fa-link"></i><span>User Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>

                  <ul class="treeview-menu">
                    <li><a href="admin.php?mode=1">Change Users Information</a></li>
                  </ul>
                </li>
                <?php
                }else if($_SESSION['tier'] == 'Driver'){
                ?>
                  <li class="header" style="margin-top:20px;padding-top:20px;padding-bottom:20px;font-size:20px">
                  <center>Driver Menu</center></li>
                  <li class="treeview">
                    <li>
                      <a href="member.php?mode=3">
                        <i class="fa fa-circle-o text-aqua">
                        </i>
                        <span>Today Work</span>
                      </a>
                    </li>
                  </li>
                <?php
                  }else if(isset($_SESSION['tier'])){
              ?>
              <li class="header" style="margin-top:20px;padding-top:20px;padding-bottom:20px;font-size:20px">
              <center>Member Menu</center></li>
              <li class="treeview">
                <li>
                  <a href="member.php?mode=5">
                    <i class="fa fa-circle-o text-aqua">
                    </i>
                    <span>Check Driver Report</span>
                  </a>
                </li>
              </li>
              <?php
                  }
                }
                ?>
        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <li class="header"
            style="margin-top:20px;padding-top:20px;padding-bottom:20px;font-size:20px"
        >
        <center>System Menu</center></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i><span>Broken Equipment Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="brokenEquip.php?mode=0">Current Job</a></li>
            <li><a href="brokenEquip.php?mode=1">History</a></li>
            <li><a href="broken_index.php">Report Broken Equipment</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="vanindex.html"><i class="fa fa-link"></i><span>Van Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="vanindex.php?mode=0">Schedule Of The Van</a></li>
            <li><a href="vanindex.php?mode=1">Van Status</a></li>
            <li><a href="vanindex.php?mode=2">Van Data/Information</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php
          if(isset($_POST['mode'])){
            if($_POST['mode'] == 0){
        ?>
        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:50px;padding-right:10px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">Old Profile</h3>
            </div>

            <div class="form-group">
              <label style="margin-top:2%">Full Name</label> : <input type="text" class="form-control pull-right" value="<?php echo $_POST['full_name']; ?>" disabled>
              <br>
              <label style="margin-top:10px">Username</label> : <input type="text" class="form-control pull-right" value=<?php echo $_POST['username']; ?> disabled>
              <br>
              <label style="margin-top:10px">E-Mail</label> : <input type="text" class="form-control pull-right" value=<?php echo $_POST['email']; ?> disabled>
              <br>
              <?php
                if(isset($_SESSION['tier'])){
                  if($_SESSION['tier'] == 'Admin'){
              ?>
              <label style="margin-top:10px">User Tier</label> : <input type="text" class="form-control pull-right" value=<?php echo $_POST['user_tier']; ?> disabled>
              <?php
                  }
                }
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:30px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">New Profile</h3>
            </div>
            <div class="form-group">
              <form action="confirm.php" method="post" id="form_member">
                <input type="hidden" name="mode" value=0>
                <input type="hidden" name="member_no" value=<?php echo $_POST['id']; ?>>
                <label style="margin-top:2%">Full Name</label> : <input type="text" name="full_name_change" class="form-control pull-right" value="<?php echo $_POST['full_name']; ?>">
                <br>
                <label style="margin-top:10px">Username</label> : <input type="text" name="username_change" class="form-control pull-right" value=<?php echo $_POST['username']; ?>>
                <br>
                <label style="margin-top:10px">E-Mail</label> : <input type="text" name="email_change" class="form-control pull-right" value=<?php echo $_POST['email']; ?>>
                <br>
                <?php
                  if(isset($_SESSION['tier'])){
                    if($_SESSION['tier'] == 'Admin'){
                ?>
                <div class="form-group">
                  <label style="margin-top:10px">User Tier</label> :
                  <select class="form-control" name="tier_change">
                    <option value=<?php echo $_POST['user_tier']; ?> selected>
                      <?php
                      echo $_POST['user_tier'];
                      ?>
                    </option>
                    <option value="Administrator">Administrator</option>
                    <option value="Ground Division Member">Ground Division Member</option>
                    <option value="Driver">Driver</option>
                    <option value="Normal_Users">Normal_Users</option>
                    <option value="Technician">Technician</option>
                  </select>
                </div>
              </form>
              <?php
                  }
                }
              ?>
            </div>
            <div style="margin-top:5%">
              <div class="col-md-6">
                <button type="submit" class="btn btn-block btn-primary" form="form_member">
                  Confirm Change
                </button>
              </div>

              <div class="col-md-6">

                <form action="admin.php" method="get">
                  <input type="hidden" name="mode" value=1>
                  <button type="submit" class="btn btn-block btn-danger">
                    Back
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      else if($_POST['mode'] == 1){
        ?>

        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:50px;padding-right:10px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">Old Profile</h3>
            </div>
            <div class="form-group">
              <label style="margin-top:10px">Van Number</label> :
                <input type="text" class="form-control pull-right" value=<?php echo $_POST['van_no']; ?> disabled><br>
              <label style="margin-top:2%">Location</label> :
                <input type="text" class="form-control pull-right" value="<?php echo $_POST['location']; ?>" disabled><br>
              <label style="margin-top:10px">Driver Name</label> :
                <input type="text" class="form-control pull-right" value="<?php echo $_POST['driver_name']; ?>" disabled><br>
              <label style="margin-top:10px">License Plate</label> :
                <input type="text" class="form-control pull-right" value=<?php echo $_POST['license_plate']; ?> disabled><br>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:30px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">New Profile</h3>
            </div>
            <div class="form-group" style="padding-bottom:5%">
              <form action="confirm.php" method="post" id="form_van">
                <input type="hidden" name="mode" value=1>
                <input type="hidden" name="van_number" value=<?php echo $_POST['van_no']; ?>>
                <label style="margin-top:2%">Location</label> :
                  <select class="form-control" name="location_change">
                    <option disabled>Please select location</option>
                    <?php
                    if($_POST['location'] == 'Bangkadi'){
                    ?>
                    <option selected value="Bangkadi">Bangkadi</option>
                    <option value="Rangsit">Rangsit</option>
                    <?php
                    }
                    else{
                    ?>
                    <option value="Bangkadi">Bangkadi</option>
                    <option selected value="Rangsit">Rangsit</option>
                    <?php
                    }
                    ?>
                  </select>
                <label style="margin-top:10px">Driver Name</label>
                  <select class="form-control" name="driver_change">
                    <option disabled>Please select driver</option>
                    <?php
                    $q = 'SELECT * FROM member WHERE member_tier = "Driver";';
                    $res = $db -> query($q);
                    while($row = $res -> fetch_array()){
                      if($row['full_name'] == $_POST['driver_name']){
                    ?>
                      <option selected value="<?php echo $row['member_id']; ?>"><?php echo $row['full_name'];?></option>
                    <?php
                      }
                      else{
                    ?>
                      <option value="<?php echo $row['member_id']; ?>"><?php echo $row['full_name'];?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                <label style="margin-top:10px">License Plate</label> :
                  <input type="text" name="license_change" class="form-control pull-right" value=<?php echo $_POST['license_plate']; ?>><br>
              </form>
            </div>
            <div style="margin-top:5%">
              <div class="col-md-6">
                <button type="submit" class="btn btn-block btn-primary" form="form_van">
                  Confirm Change
                </button>
              </div>

              <div class="col-md-6">
                <form action="admin.php" method="get">
                  <input type="hidden" name="mode" value=0>
                  <button type="submit" class="btn btn-block btn-danger">
                    Back
                  </button>
                </form>
              </div>
          </div>
        </div>

        <?php
      }
      else if($_POST['mode'] == 2){
        ?>

        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:50px;padding-right:10px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">Old Profile</h3>
            </div>
            <div class="form-group">
              <label style="margin-top:10px">Full Name</label> :
                <input type="text" class="form-control pull-right" value="<?php echo $_POST['full_name']; ?>" disabled><br>
              <label style="margin-top:2%">Username</label> :
                <input type="text" class="form-control pull-right" value="<?php echo $_POST['username']; ?>" disabled><br>
              <label style="margin-top:10px">E-mail</label> :
                <input type="text" class="form-control pull-right" value="<?php echo $_POST['email']; ?>" disabled><br>
              <label style="margin-top:10px">Telephone Number</label> :
                <input type="text" name="tele_num" class="form-control" value="<?php echo $_POST['user_telephone']; ?>" placeholder="<?php echo $_POST['user_telephone']; ?>" required="" data-inputmask='"mask": "(999) 999-9999"' data-mask disabled>
              <label style="margin-top:10px">Your Position</label> :
                <input type="text" class="form-control pull-right" value=<?php echo $_POST['user_tier']; ?> disabled><br>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:30px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">New Profile</h3>
            </div>
            <div class="form-group" style="padding-bottom:5%">
              <form action="confirm.php" method="post" id="form_van">
                <input type="hidden" name="mode" value=9>
                <input type="hidden" name="u_num" value=<?php echo $_POST['user_num']; ?>>
                <label style="margin-top:10px">Full Name</label> :
                  <input type="text" name="f_name" class="form-control pull-right" value="<?php echo $_POST['full_name']; ?>" ><br>
                <label style="margin-top:2%">Username</label> :
                  <input type="text" name="u_name" class="form-control pull-right" value="<?php echo $_POST['username']; ?>" ><br>
                <label style="margin-top:10px">E-mail</label> :
                  <input type="text" name="e_mail" class="form-control pull-right" value="<?php echo $_POST['email']; ?>" ><br>
                <label style="margin-top:10px">Telephone Number</label> :
                  <input type="text" name="tele_num" class="form-control" value="<?php echo $_POST['user_telephone']; ?>" placeholder="<?php echo $_POST['user_telephone']; ?>" required="" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                <label style="margin-top:10px">Your Position</label> :
                  <input type="text" name="u_tier" class="form-control pull-right" value=<?php echo $_POST['user_tier']; ?> disabled><br>
              </form>
            </div>
            <div style="margin-top:5%">
              <div class="col-md-6">
                <button type="submit" class="btn btn-block btn-primary" form="form_van">
                  Confirm Change
                </button>
              </div>

              <div class="col-md-6">
                <form action="admin.php" method="get">
                  <input type="hidden" name="mode" value=0>
                  <button type="submit" class="btn btn-block btn-danger">
                    Back
                  </button>
                </form>
              </div>
          </div>
        </div>

        <?php
      }
    }
        ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      This point is this class
    </div>
    <!-- Default to the left -->
    <strong>Sirindhorn International Institute of Technology (SIIT)</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script>
  $(function () {
    $("[data-mask]").inputmask();
  });
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
