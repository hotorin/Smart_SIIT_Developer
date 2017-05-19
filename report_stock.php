<?php
require_once('connect.php');
session_start();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.css">
</head>

<body>
  <div class="box" style="padding-left:10px;padding-right:10px;padding-bottom:30px">
    <div class="box-header">
      <center>
        <h3 class="box-title" style="margin-top:10px"><b>รายงานระบบแจ้งซ่อม</b></h3><br>
        (นี้คือ Report ของวันที่ XX-XX-XX)
      </center>
      <hr>
    </div>
    <div style="margin-top:10px">
      <center>
        <h3 class="box-title" style="margin-top:10px"><b>ประวัติการเบิกสิ่งของ</b></h3>
      </center>
    </div>
    <table id="example2" class="table table-bordered table-hover" style="width:80%;margin-bottom:10%" align="center">
      <thead>
        <tr>
          <td style="text-align:center">เลขประวัติ</td>
          <td style="text-align:center">ชื่ออุปกรณ์</td>
          <td style="text-align:center">จำนวน</td>
          <td style="text-align:center">ล็อตที่</td>
          <td style="text-align:center">ชื่อผู้เบิก</td>
          <td style="text-align:center">วันที่</td>
        </tr>
      </thead>
      <?php
        if(isset($_POST['date_f']) && isset($_POST['date_t'])){
          $q = "SELECT * FROM stock_history,  member WHERE    stock_history.stock_staff = member.member_id
                                                              AND (stock_history.stock_date
                                                              BETWEEN '".$_POST['date_f']."'
                                                              AND '".$_POST['date_t']."');";
          $res = $db -> query($q);
        }else{
      ?>
          <script type='text/javascript'>
            alert('Please Select Date first before summarize');
          </script>
          <script type='text/javascript'>
            window.location = 'weeklySum.php';
          </script>
      <?php
        }
        while($row = $res -> fetch_array()){
      ?>
      <tbody>
        <tr>
          <td style="text-align:center"><?php echo $row['history_id']; ?></td>
          <td style="text-align:center"><?php echo $row['stock_name']; ?></td>
          <td style="text-align:center"><?php echo $row['stock_total']; ?></td>
          <td style="text-align:center"><?php echo $row['stock_lot']; ?></td>
          <td style="text-align:center"><?php echo $row['full_name']; ?></td>
          <td style="text-align:center"><?php echo $row['stock_date']; ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <hr>
    <div style="margin-top:3%">
      <center>
        <h3 class="box-title" style="margin-top:10px"><b>ประวัติการซ่อม</b></h3>
      </center>
    </div>
    <table id="example2" class="table table-bordered table-hover" style="width:95%;" align="center">
      <thead>
        <tr>
          <td style="text-align:center;width:5%">เลข</td>
          <td style="text-align:center;width:10%">ชื่อสิ่งของ</td>
          <td style="text-align:center;width:7%">สถานที่</td>
          <td style="text-align:center;width:7%">ตึก</td>
          <td style="text-align:center;width:7%">ห้อง</td>
          <td style="text-align:center;width:11%">ผู้ร้องขอ</td>
          <td style="text-align:center;width:11%">ผู้ซ่อม</td>
          <td style="text-align:center;width:11%">วันที่แจ้ง</td>
          <td style="text-align:center;width:11%">สถานะ</td>
        </tr>
      </thead>
      <?php
        if(isset($_POST['date_f']) && isset($_POST['date_t'])){
          $q = "SELECT * FROM broken_equipment,  member       WHERE    broken_equipment.equipment_assign = member.member_id
                                                              AND (broken_equipment.equipment_date_s
                                                              BETWEEN '".$_POST['date_f']."'
                                                              AND '".$_POST['date_t']."') ORDER BY equipment_ID ASC;";
          $res = $db -> query($q);
        }else{
      ?>
          <script type='text/javascript'>
            alert('Please Select Date first before summarize');
          </script>
          <script type='text/javascript'>
            window.location = 'weeklySum.php';
          </script>
      <?php
        }
        while($row = $res -> fetch_array()){
      ?>
      <tbody>
        <tr>
          <td style="text-align:center;width:5%"><?php echo $row['equipment_ID']; ?></td>
          <td style="text-align:center;width:10%"><?php echo $row['equipment_name']; ?></td>
          <td style="text-align:center;width:7%"><?php echo $row['equipment_campus']; ?></td>
          <td style="text-align:center;width:7%"><?php echo $row['equipment_building']; ?></td>
          <td style="text-align:center;width:7%"><?php echo $row['equipment_room']; ?></td>
          <td style="text-align:center;width:11%"><?php echo $row['equipment_username']; ?></td>
          <td style="text-align:center;width:11%"><?php echo $row['full_name']; ?></td>
          <td style="text-align:center;width:11%"><?php echo $row['equipment_date_s']; ?></td>
          <td style="text-align:center;width:11%"><?php echo $row['equipment_status']." (".$row['equipment_date_f'].")"; ?></td>
        </tr>
        <?php
        }
        ?>
  </div>
</body>


<script>
  var pdf = new jsPDF('p', 'pt', 'a4');
    pdf.addHTML(document.body, function(){
    pdf.save('Stock Report.pdf');
  });
</script>

<script type='text/javascript'>
  alert('Your Reported Successful Create');
</script>
<script type='text/javascript'>
  setTimeout(function() {
    window.location = 'manage_stock.php?mode=2.php';
  }, 1000);
</script>
