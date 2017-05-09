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
        <h3 class="box-title" style="margin-top:10px"><b>Van Report & Broken Equipment Report</b></h3><br>
        (นี้คือ Report ของวันที่ XX-XX-XX)
      </center>
      <hr>
    </div>
    <table id="example2" class="table table-bordered table-hover" style="width:80%;" align="center">
      <thead>
        <tr>
          <td style="text-align:center">วันที่</td>
          <td style="text-align:center">ระยะทาง</td>
          <td style="text-align:center">จำนวนคน</td>
          <td style="text-align:center">จาก</td>
          <td style="text-align:center">ถึง</td>
          <td style="text-align:center">คนขับ</td>
        </tr>
      </thead>
      <?php
        if(isset($_POST['date_f']) && isset($_POST['date_t'])){
          $q = "SELECT * FROM data_information, driver, member WHERE      data_information.driver_no = driver.driver_no
                                                                      AND driver.member_id = member.member_id
                                                                      AND (data_information.data_date
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
          <td style="text-align:center"><?php echo $row['data_date']; ?></td>
          <td style="text-align:center"><?php echo $row['data_distance']; ?></td>
          <td style="text-align:center"><?php echo $row['data_passanger']; ?></td>
          <td style="text-align:center"><?php echo $row['data_from']; ?></td>
          <td style="text-align:center"><?php echo $row['data_to']; ?></td>
          <td style="text-align:center"><?php echo $row['full_name']; ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>


<script>
  var pdf = new jsPDF('p', 'pt', 'a4');
    pdf.addHTML(document.body, function(){
    pdf.save('web.pdf');
  });
</script>

<script type='text/javascript'>
  alert('Your Reported Successful Create');
</script>
<script type='text/javascript'>
  setTimeout(function() {
    window.location = 'weeklySum.php';
  }, 1000);
</script>
