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
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.css">
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
              <img src=<?php echo $_SESSION['u_pic']; ?> class="user-image" alt="User Image">  <!-- The user image in the navbar-->
              <span class="hidden-xs"><?php echo $_SESSION['fname']; ?></span> <!-- hidden-xs hides the username on small devices so only the image appears. -->
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">  <!-- The user image in the menu -->
                <img src=<?php echo $_SESSION['u_pic']; ?> class="img-circle" alt="User Image">
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
                    <a href="member.php?mode=1">Request</a>
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
            }else if($_SESSION['tier'] == 'Admin_van'){
              ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">   <!-- Menu Toggle Button -->
                  <img src=<?php echo $_SESSION['u_pic']; ?> class="user-image" alt="User Image">  <!-- The user image in the navbar-->
                  <span class="hidden-xs"><?php echo $_SESSION['fname']; ?></span> <!-- hidden-xs hides the username on small devices so only the image appears. -->
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">  <!-- The user image in the menu -->
                    <img src=<?php echo $_SESSION['u_pic']; ?> class="img-circle" alt="User Image">
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
                        <a href="member.php?mode=1">Request</a>
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
            }else{
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">   <!-- Menu Toggle Button -->
              <img src=<?php echo $_SESSION['u_pic']; ?> class="user-image" alt="User Image">  <!-- The user image in the navbar-->
              <span class="hidden-xs"><?php echo $_SESSION['fname']; ?></span> <!-- hidden-xs hides the username on small devices so only the image appears. -->
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">  <!-- The user image in the menu -->
                <img src=<?php echo $_SESSION['u_pic']; ?> class="img-circle" alt="User Image">
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
                    <a href="member.php?mode=1">Request</a>
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
          <img src=<?php echo $_SESSION['u_pic']; ?> class="img-circle" alt="User Image">
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
                    <li><a href="manage_stock.php?mode=2">รายงานสต็อค</a></li>
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
                      <span>สรุปงาน</span>
                    </a>
                  </li>
                </li>
                <?php
                }else if($_SESSION['tier'] == 'Admin_van'){
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
                      <li>
                        <a href="driver_report.php">
                          <i class="fa fa-circle-o text-aqua">
                          </i>
                          <span>กรอกข้อมูลงานของรถตู้</span>
                        </a>
                      </li>
                    </li>
                    <li class="treeview">
                      <li>
                        <a href="weeklySum.php">
                          <i class="fa fa-circle-o text-aqua">
                          </i>
                          <span>สรุปงาน</span>
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
                            <li><a href="manage_stock.php?mode=2">รายงานสต็อค</a></li>
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
                    <span>สรุปงาน</span>
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
      <?php
        if($_GET['mode'] == 0){
      ?>
        <h1>
        Van List
        <small>- List of all Van</small>
        </h1>
      <?php
        }else if($_GET['mode'] == 1){
      ?>
        <h1>
        User List
        <small>- List of all users </small>
        </h1>
      <?php
      }else if($_GET['mode'] == 2){
      ?>
        <h1>
        Week Scheduel Assign
        <small>- โปรดเลือกรถตู้เพื่อจ่ายงาน </small>
        </h1>
      <?php
        }
      ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php
        if($_GET['mode'] == 0){
      ?>
      <div class="box" style="padding-bottom:30px;padding-left:30px;padding-right:30px;padding-bottom:60px">
        <table id="example2" class="table table-bordered table-hover" style="width:100%;margin-top:40px" align="center">
        <thead>
        <tr>
        <td style="text-align:center;width:10%">รอตู้หมายเลข</td>
        <td style="text-align:center;width:20%">สถานที่ประจำ</td>
        <td style="text-align:center">ผู้ขับรถ</td>
        <td style="text-align:center">ทะเบียนรถตู้</td>
        <td style="text-align:center">แก้ไขข้อมูล</td>
        <td style="text-align:center">ลบสมาชิก</td>
        </tr>
      </thead>
      <?php
      $q = 'SELECT * FROM van, driver, member WHERE van.driver_no = driver.driver_no AND
                                                    driver.member_id = member.member_id;';
      $res = $db -> query($q);
      while($row = $res -> fetch_array()){
      ?>
      <tbody>
          <tr>
          <td style="text-align:center"><?php echo $row['van_no']; ?></td>
          <td style="text-align:center"><?php echo $row['location']; ?></td>
          <td style="text-align:center"><?php echo $row['full_name']; ?></td>
          <td style="text-align:center"><?php echo $row['van_license_plate']; ?></td>
          <td style="text-align:center;width:18%;">
            <form id="prof_form" action="profile.php" method="post">
                <input type="hidden" name="mode" value=1>
                <input type="hidden" name="van_no" value=<?php echo $row['van_no']; ?> >
                <input type="hidden" name="location" value=<?php echo $row['location']; ?> >
                <input type="hidden" name="driver_name" value="<?php echo $row['full_name']; ?>" >
                <input type="hidden" name="license_plate" value=<?php echo $row['van_license_plate']; ?> >
                <input type="submit" class="btn btn-block btn-primary" value="แก้ไขสมาชิก">
            </form>
          </td>
          <th style="text-align:center;width:18%;">
            <form action="delete.php" method="post">
              <input type="hidden" name="mode" value=1 >
              <input type="hidden" name="van_no" value=<?php echo $row['van_no'];?>>
              <button type="submit" class="btn btn-block btn-danger">
                ลบ
              </button>
            </form>
          </th>
          </tr>

      </tbody>
      <?php
      }
      ?>
      </table>
      <div  class="col-md-3"></div>
      <div  class="col-md-6">
        <form action="add.php" method="post">
          <input type="hidden" name="mode" value=0>
          <button type="submit" class="btn btn-block btn-primary">เพิ่มรถตู้</button>
        </form>
      </div>
    </div>


      <?php
        }else if($_GET['mode'] == 1){
      ?>

        <div class="box" style="paddin-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;padding-bottom:20px">
          <div class="col-sm-3"></div>
          <div class="col-sm-5" style="margin-top:20px">
            <div class="input-group date">
                <div class="input-group-addon">
                  <label>ค้นหาจาก User ผู้ใช้</label>
                </div>
                <form action="admin.php?mode=1" method="post" id="search_user">
                  <input type="text" name="user_search" class="form-control pull-right" placeholder="โปรดใส่ Username">
                </form>
                <form action="admin.php?mode=1" method="post" id="reset_search"></form>
            </div>
          </div>
          <button style="margin-top:20px" type="submit" class="btn btn-primary" form="search_user">Submit</button>
          <button style="margin-top:20px" type="submit" class="btn btn-danger" form="reset_search">Reset</button>
          <table id="example2" class="table table-bordered table-hover" style="width:100%;margin-top:20px" align="center">
            <thead>
              <tr>
                <td style="text-align:center;width:10%">ไอดีสมาชิก</td>
                <td style="text-align:center;width:20%">Username</td>
                <td style="text-align:center;width:20%">E-mail</td>
                <td style="text-align:center;width:20%">ตำแหน่ง</td>
                <td style="text-align:center;width:20%">แก้ไขข้อมูล</td>
                <td style="text-align:center;width:20%">ลบสมาชิก</td>
              </tr>
            </thead>
            <?php
              if(isset($_POST['user_search'])){
                $q = 'SELECT * FROM member WHERE username = "'.$_POST['user_search'].'";';
              }else{
                $q = 'SELECT * FROM member';
              }
              $res = $db -> query($q);
              while($row = $res -> fetch_array()){
            ?>
            <tr>
              <td style="text-align:center"><?php echo $row['member_id']; ?></td>
              <td style="text-align:center"><?php echo $row['username']; ?></td>
              <td style="text-align:center"><?php echo $row['email']; ?></td>
              <td style="text-align:center"><?php echo $row['member_tier']; ?></td>
              <td style="text-align:center">
                <form id="prof_form" action="profile.php" method="post">

                    <input type="hidden" name="mode" value=0 >
                    <input type="hidden" name="id" value=<?php echo $row['member_id']; ?> >
                    <input type="hidden" name="full_name" value="<?php echo $row['full_name']; ?>" >
                    <input type="hidden" name="username" value=<?php echo $row['username']; ?> >
                    <input type="hidden" name="password" value=<?php echo $row['password']; ?> >
                    <input type="hidden" name="email" value=<?php echo $row['email']; ?> >
                    <input type="hidden" name="user_tier" value="<?php echo $row['member_tier']; ?>" >
                    <input type="submit" class="btn btn-block btn-primary" value="แก้ไขข้อมูล">

                </form>
              </td>
              <th style="text-align:center;width:18%;">
                <form action="delete.php" method="post">
                  <input type="hidden" name="mode" value=0 >
                  <input type="hidden" name="id" value=<?php echo $row['member_id'];?>>
                  <button type="submit" class="btn btn-block btn-danger">
                    ลบ
                  </button>
                </form>
              </th>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>


      <?php
        }else if($_GET['mode'] == 2){
      ?>
          <div class="box box-danger">
            <div class="box-header" style="padding-left:2%;padding-right:2%;">
              <h3 class="box-title" style="margin-top:1%"><b>Weekly Assign</b></h3>
              <hr>
            </div>
            <div class="box-body" style="padding-top:0px">
              <div class="box-body" style="padding-top:0px">

                <form action="confirm.php" method="post" id="request_form">
                  <input type="hidden" name="mode" value=12>

                <div class="form-group col-md-12">
                  <div class="col-md-2" style="padding-top:0.5%">
                    Start Date (เริ่มวันที่)
                  </div>
                  <div class="col-md-4" style="padding-left:0">
                    <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                          <input type="text" name="start_date" class="form-control pull-right" id="datepicker" required>
                    </div>
                  </div>

                  <div class="col-md-2" style="padding-top:0.5%">
                    End Date (จบวันที่)
                  </div>
                  <div class="col-md-4" style="padding-left:0">
                    <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                          <input type="text" name="end_date" class="form-control pull-right" id="datepicker2" required>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <div class="bootstrap-timepicker">
                    <div class="col-md-2" style="padding-top:0.5%">
                      <label>From (เวลาเริ่ม)</label>
                    </div>
                    <div class="col-md-4" style="padding-left:0">
                      <div class="input-group" style="margin-bottom:10px;">
                        <input type="text" name="from_time" class="form-control timepicker" required>
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="col-md-2" style="padding-top:0.5%">
                      <label>To (เวลาจบ)</label>
                    </div>
                    <div class="col-md-4" style="padding-left:0">
                      <div class="input-group" style="margin-bottom:10px;">
                        <input type="text" name="to_time" class="form-control timepicker" required>
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-2" style="padding-top:0.5%">
                      <label>Place to go (สถานที่)</label>
                    </div>
                    <div class="col-md-4" style="padding-left:0">
                      <input type="text" name="destination" class="form-control" placeholder="Please insert the place in this box" required></input>
                    </div>

                    <div class="col-md-2" style="padding-top:0.5%">
                      <label>Van No. (คันที่)</label>
                    </div>
                    <div class="col-md-4" style="padding-left:0">
                      <select class="form-control" name="assign_to" required>
                        <option selected disabled>Please Select The Van to assign the work</option>
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
                    </div>
                </div>

                <div class="form-group col-md-12">
                  <div class="col-md-2" style="padding-top:0%">
                    <label>Description (รายละเอียด)</label>
                  </div>
                  <div class="col-md-10" style="padding-left:0">
                    <input type="text" name="description" class="form-control" placeholder="If have any comment please type"></input>
                  </div>
                </div>
              </div>

            </form>

                <div  class="col-md-3"></div>
                <div  class="col-md-6" style="padding-top:20px;padding-bottom:4%">
                  <button type="submit" class="btn btn-block btn-primary" form="request_form">Submit</button>
                </div>

            </div>
      <?php
        }
      ?>


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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "pageLength": 5,
      "autoWidth": false
    });
    $(".timepicker").timepicker({
      minuteStep: 60,
      defaultTime: '06:00',
      use24hours: true,
      showMeridian: false,
      showInputs: false
    });
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

   });

</script>
