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
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.css"> <!--Choose Skin-->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css"> <!-- DataTables -->
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


        <li class="active treeview">
          <a href=""><i class="fa fa-link"></i><span>Van Management</span>
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

    <?php
      if($_GET['mode'] == 0){
    ?>
    <section class="content-header">
      <h1>
        Schedule of the Van
        <small>- Number "<?php echo $_GET['v']; ?>"</small>
      </h1>
    </section>
    <section class="content">
      <div class="col-sm-13">
        <div class="box" style="padding-bottom:30px;padding-left:30px;padding-right:30px">
          <div class="box-header">
            <div class="col-sm-4">
            <h3 class="box-title" style="margin-top:8px">Please select date to view the schedule :</h3>
            </div>
            <div class="col-sm-2">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <form action="vanSystem.php?mode=0&v=<?php echo $_GET['v']; ?>" method="post" id="date_add">
                    <input type="text" name="date_pick" class="form-control pull-right" id="datepicker">
                  </form>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" form="date_add">Submit</button>

          </div>
          <?php
          if(isset($_POST['date_pick']) && $_POST['date_pick'] != ''){
            echo "This is the schedule at : ".$_POST['date_pick'];
          }
          else{
            echo "This is the schedule at : ".date("Y-m-d");
          }
          ?>
        <div style="overflow-x:auto;">
        <table id="example2" class="table table-bordered table-hover" style="width:100%;" align="center">
        <tr style="height:30px;">
            <th bgcolor="#F0F8FF" style="text-align:center;width:10%;">Information</th>
            <?php
            for($x = 6 ; $x < 19 ; $x++){
              switch ($x) {
                case ($x < 10):
                  echo '<th bgcolor="yellow" style="text-align:center;">0'.$x.':00</th>';
                  break;
                case ($x >= 10):
                  echo '<th bgcolor="yellow" style="text-align:center;">'.$x.':00</th>';
                  break;
              }
            }
            ?>
        </tr>
        <?php

        $count = 0;
        $timestart = array();
        $timeend = array();
        $requestdescription = array();
        $requestby = array();

        if(isset($_POST['date_pick']) && $_POST['date_pick'] != ''){
          $q = "SELECT * FROM request, member WHERE request_date = '".$_POST['date_pick']."' AND
                                                    request_assign = ".$_GET['v']." AND
                                                    request.request_by = member.member_id
                                              ORDER BY request_from
                                                    ;";
        }
        else{
          $q = "SELECT * FROM request, member WHERE request_date = '".date("Y-m-d")."' AND
                                                    request_assign = ".$_GET['v']." AND
                                                    request.request_by = member.member_id
                                              ORDER BY request_from
                                                    ;";
        }
        $res = $db -> query($q);
        while($row = $res -> fetch_array()){
          array_push($timestart, $row['request_from']);
          array_push($timeend, $row['request_to']);
          array_push($requestdescription, $row['request_description']);
          array_push($requestby, $row['full_name']);
        }

        ?>

        <?php

        for($x = 0 ; $x < 3 ; $x++){
          $count = 0;
          switch ($x) {
            case 0;
              $txt_title = "Status";
              break;
            case 1:
              $txt_title = "Reserved By";
              break;
            case 2:
              $txt_title = "Description";
              break;
          }
          echo '<tr style="height:40px;">';
          echo '<td style="text-align:center;">'.$txt_title.'</td>';

          for($row_num = 6 ; $row_num < 19 ; $row_num++){
            if($row_num < 10){
              $compare = '0'.$row_num.':00:00';
            }else{
              $compare = $row_num.':00:00';
            }

            if(isset($timestart[$count]) && $timestart[$count] <= $compare && $compare <= $timeend[$count]){

              echo '<td bgcolor="yellow" style="text-align:center;">';
              switch($x){
                case 0;
                  echo "Reserved";
                  break;
                case 1:
                  echo $requestby[$count];
                  break;
                case 2:
                  echo $requestdescription[$count];
                  break;
              }
              echo '</td>';
            }else if(isset($timestart[$count + 1]) && $timestart[$count + 1] <= $compare && $compare <= $timeend[$count + 1]){
              $count++;
              echo '<td bgcolor="yellow" style="text-align:center;">';
              switch($x){
                case 0;
                  echo "Reserved";
                  break;
                case 1:
                  echo $requestby[$count];
                  break;
                case 2:
                  echo $requestdescription[$count];
                  break;
              }
              echo '</td>';
            }else {
              echo '<td style="text-align:center;">';
              echo '</td>';
            }
          }
          echo '</tr>';
        }

        ?>
      </table>
    </div>
    </div>
    </div>
    </section>
    <?php
      }else if($_GET['mode'] == 1){
    ?>
    <section class="content-header">
      <center>
        <h1>
          This is the information for Van number : <?php echo $_GET['v']; ?>
        </h1>
      </center>
    </section>

    <section class="content">

      <div class="box col-sm-12" style="text-align:center;padding-bottom:40px">
        <div class="box-header">
          <h3 class="box-title" style="margin-top:20px">Van And Driver Information</h3>
          <hr>
        </div>

        <?php
        $q = 'SELECT * FROM van, driver, member WHERE van.van_no = '.$_GET['v'].' AND
                                                      van.driver_no = driver.driver_no AND
                                                      driver.member_id = member.member_id;';
        $res = $db -> query($q);
        while($row = $res -> fetch_array()){
        ?>
        <div class="col-sm-12" style="padding-bottom:20px">
          <div class="col-sm-3">
            <img src="resource/image/profile.png" height="50%" width="60%" style="margin-top:5.5%;" class="user-image" alt="User Image">
          </div>
          <div class="col-sm-9">
            <center>
              <table class="table table-bordered table-hover" border="2" style="width:80%;margin-top:1%;">
                <tr style="height:40px;">
                  <td style="text-align:center;width:20%;">Name</td>
                  <td style="text-align:center;width:50%"><?php echo $row['full_name']; ?></td>
                </tr>
                <tr style="height:40px;">
                  <td style="text-align:center;width:20%">Position</td>
                  <td style="text-align:center;width:50%"><?php echo $row['driver_position']; ?></td>
                </tr>
                <tr style="height:40px;">
                  <td style="text-align:center;width:20%">Van Number</td>
                  <td style="text-align:center;width:50%"><?php echo $row['van_no']; ?></td>
                </tr>
                <tr style="height:40px;">
                  <td style="text-align:center;width:20%">Location</td>
                  <td style="text-align:center;width:50%"><?php echo $row['location']; ?></td>
                </tr>
                <tr style="height:60px;">
                  <td style="text-align:center;width:20%">More Information</td>
                  <td style="text-align:center;width:50%"><?php echo $row['email']; ?></td>
                </tr>
              </table>
            </center>
          </div>
        </div>
        <?php
        }
        ?>
        &nbsp;
        <hr>
        <?php
            if(isset($_SESSION['tier'])){
              if($_SESSION['tier'] == 'Admin'){
        ?>
        <div class="box-header">
          <h3 class="box-title" style="margin-top:20px">Other Information</h3>
        </div>
        <table id="example2" class="table table-bordered table-hover" style="width:100%;" align="center">
            <thead>
              <tr style="height:25px;">
                <td style="text-align:center;width:10%;">Date</td>
                <td style="text-align:center;width:10%;">Distance</td>
                <td style="text-align:center;width:10%;">Number of Passenger</td>
                <td style="text-align:center;width:10%;">From</td>
                <td style="text-align:center;width:10%;">To</td>
                <td style="text-align:center;width:10%;">Driver Name</td>
              </tr>
            </thead>
            <tbody>
              <?php
                $q = 'SELECT * FROM data_information, driver, member  WHERE driver_van_num = '.$_GET['v'].'
                                                              AND   data_information.driver_no = driver.driver_no
                                                              AND   driver.member_id = member.member_id;';
                $res = $db -> query($q);
                while($row = $res -> fetch_array()){
              ?>
                  <tr style="height:25px;">
                    <td style="text-align:center;width:10%;"><?php echo $row['data_date']; ?></td>
                    <td style="text-align:center;width:10%;"><?php echo $row['data_distance']; ?></td>
                    <td style="text-align:center;width:10%;"><?php echo $row['data_passanger']; ?></td>
                    <td style="text-align:center;width:10%;"><?php echo $row['data_from']; ?></td>
                    <td style="text-align:center;width:10%;"><?php echo $row['data_to']; ?></td>
                    <td style="text-align:center;width:10%;"><?php echo $row['full_name']; ?></td>
                  </tr>
              <?php
                }
             ?>
            </tbody>
          </table>
        <?php
              }
            }
        ?>

      </div>
        &nbsp; <!-- Fix Magic Bug - - -->
    </section>
<?php
  }
?>
</div>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
     <script>
       $(function () {
         $("#example1").DataTable();
         $('#example2').DataTable({
           "paging": true,
           "lengthChange": false,
           "searching": false,
           "ordering": false,
           "info": true,
           "autoWidth": false
         });
       });
       $('#datepicker').datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true
       });

     </script>
</body>
</html>
