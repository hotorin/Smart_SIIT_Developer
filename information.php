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
                  <?php echo $_SESSION['fname']; ?> - Admin

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
                      <input type="hidden" name="username" value=<?php echo $_SESSION['user_name']; ?> >
                      <input type="hidden" name="password" value=<?php echo $_SESSION['user_pass']; ?> >
                      <input type="hidden" name="email" value=<?php echo $_SESSION['e_mail']; ?> >
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
                    <li><a href="admin.php?mode=2">Add Week Schedule</a></li>
                    <li><a href="analysis_van.php">Van Analysis</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#"><i class="fa fa-link"></i><span>Stock Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>

                  <ul class="treeview-menu">
                    <li><a href="manage_stock.php?mode=0">Add/Delete Stock</a></li>
                    <li><a href="manage_stock.php?mode=1">View Stock</a></li>
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

                <li class="treeview">
                  <li>
                    <a href="member.php?mode=5">
                      <i class="fa fa-circle-o text-aqua">
                      </i>
                      <span>Check Driver Report</span>
                    </a>
                  </li>
                </li>
                <li class="treeview">
                  <li>
                    <a href="weeklySum.php">
                      <i class="fa fa-circle-o text-aqua">
                      </i>
                      <span>Weekly Report</span>
                    </a>
                  </li>
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
                    if($_SESSION['tier'] == 'Technician'){
                    ?>
                      <li class="header" style="margin-top:20px;padding-top:20px;padding-bottom:20px;font-size:20px">
                        <center>Technician Menu</center></li>
                        <li class="treeview">
                          <a href="#"><i class="fa fa-link"></i><span>Stock Management</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="manage_stock.php?mode=0">Add/Delete Stock</a></li>
                            <li><a href="manage_stock.php?mode=1">View Stock</a></li>
                          </ul>
                        </li>
                  <?php
                    }
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
              <li class="treeview">
                <li>
                  <a href="weeklySum.php">
                    <i class="fa fa-circle-o text-aqua">
                    </i>
                    <span>Weekly Report</span>
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
        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:30px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">Request Information</h3>
            </div>

            <div class="form-group">
              <label style="margin-top:2%">Request By (ขอโดย)</label> : <input type="text" class="form-control pull-right" value="<?php echo $_POST['full_name']; ?>" disabled>
              <br>
              <label style="margin-top:10px">Date (วันที่)</label> : <input type="text" class="form-control pull-right" value="<?php echo $_POST['date']; ?>" disabled>
              <br>
              <label style="margin-top:10px">From (ตั้งแต่)</label> : <input type="text" class="form-control pull-right" value=<?php echo substr($_POST['from'],0,5); ?> disabled>
              <br>
              <label style="margin-top:10px">To (จนถึง)</label> : <input type="text" class="form-control pull-right" value=<?php echo substr($_POST['to'],0,5); ?> disabled>
              <br>
              <label style="margin-top:10px">Description (ข้อมูลเพิ่มเติม)</label> :
              <textarea class="form-control" rows="5" placeholder="<?php echo $_POST['description']; ?>" disabled></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-body" style="padding-bottom:30px">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>
                <h3 class="box-title">Assign Menu</h3>
            </div>

            <form action="confirm.php" method='post' id="confirm_form">
              <input type="hidden" name="mode" value=5>
              <input type="hidden" name="request_number" value=<?php echo $_POST['request_no']; ?>>
              <input type="hidden" name="assign_by" value=<?php echo $_SESSION['user_no']; ?>>
              <input type="hidden" name="start_check" value=<?php echo $_POST['from']; ?>>
              <input type="hidden" name="end_check" value=<?php echo $_POST['to']; ?>>
              <input type="hidden" name="date_check" value=<?php echo $_POST['date']; ?>>
              <label style="margin-top:2%">Assign To Van Number (มอบงานให้กับรถหมายเลข)</label>
              <select class="form-control" name="assign_to">
                <option selected disabled>โปรดเลือกรถตู้เพื่อมอบหมายงาน</option>
                <?php
                  $q = "SELECT * FROM van";
                  $res = $db -> query($q);
                  while($row = $res -> fetch_array()){
                ?>
                  <option value=<?php echo $row['van_no']; ?>>Van Number <?php echo $row['van_no']; ?></option>
                <?php
                  }
                ?>
              </select>
              <label style="margin-top:10px">Assign By (มอบหมายโดยใคร) (Member Number)</label> :
              <input type="text" class="form-control pull-right" value="<?php echo $_SESSION['user_no']; ?>" disabled><br>
            </form>

            <label style="margin-top:10px">Description (ข้อมูลเพิ่มเติม)</label> :
            <div style="padding-bottom:20px">
              <textarea class="form-control" name="comment" rows="10" placeholder="Please Type your comment if have..." form="confirm_form"></textarea>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-block btn-primary" form="confirm_form">
                Confirm Request
              </button>
            </div>

            <div class="col-md-6">
              <form action="confirm.php" method='post' id="delete_form">
                <input type="hidden" name="mode" value=6>
                <input type="hidden" name="request_number" value=<?php echo $_POST['request_no']; ?>>
                <input type="hidden" name="assign_by" value=<?php echo $_SESSION['user_no']; ?>>
                <button type="submit" class="btn btn-block btn-danger">
                  Decline request
                </button>
              </form>
            </div>

          </div>
        </div>
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
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
