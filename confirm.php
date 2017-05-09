<?php
require_once('connect.php');
session_start();
?>

<?php
  if($_POST['mode'] == 0){
    echo $_POST['mode'];
    echo $_POST['full_name_change'];
    echo $_POST['username_change'];
    echo $_POST['email_change'];
    echo $_POST['member_no'];
    echo $_POST['tier_change'];

    $q = 'SELECT * FROM member WHERE member_id = '.$_POST['member_no'].';';
    $res = $db -> query($q);
    echo '<br>';
    if ($res && $res->num_rows == 1 ){
      $q = 'UPDATE member SET     full_name="'.$_POST['full_name_change'].'",
                                  username="'.$_POST['username_change'].'",
                                  email="'.$_POST['email_change'].'",
                                  member_tier="'.$_POST['tier_change'].'"
                          WHERE   member_id='.$_POST['member_no'].';';
      $res = $db -> query($q);

      $q = 'SELECT * FROM driver WHERE member_id = '.$_POST['member_no'].';';
      $res = $db -> query($q);
      if ($res && $res->num_rows == 1 ){
      }
      else{
        $q = 'INSERT INTO   driver  (driver_position, member_id)
                            VALUE   ("Driver", '.$_POST['member_no'].');';
        $res = $db -> query($q);
      }

    }
    else{
  ?>

  <script type='text/javascript'>
    alert('The modified can not proceed because some problem!');
  </script>
  <script type='text/javascript'>
    window.location = 'admin.php?mode=1';
  </script>

  <?php
    }
  }
  else if($_POST['mode'] == 1){
    echo $_POST['mode'];
    echo $_POST['location_change'];
    echo $_POST['driver_change'];
    echo $_POST['license_change'];
    echo $_POST['van_number'];

    $q = 'SELECT * FROM van WHERE van_no = '.$_POST['van_number'].';';
    $res = $db -> query($q);
    echo '<br>';
    if ($res && $res->num_rows == 1 ){
      $q = 'SELECT * FROM driver WHERE member_id = '.$_POST['driver_change'].';';
      $res = $db -> query($q);
      while($row = $res -> fetch_array()){
        $id_update = $row['driver_no'];
      }
      echo '<br>';
      $q = 'UPDATE van SET        location="'.$_POST['location_change'].'",
                                  driver_no='.$id_update.',
                                  van_license_plate="'.$_POST['license_change'].'"
                          WHERE   van_no='.$_POST['van_number'].';';
      $res = $db -> query($q);
    }
    else{
    ?>

      <script type='text/javascript'>
        alert('The modified can not proceed because some problem!');
      </script>
      <script type='text/javascript'>
        window.location = 'admin.php?mode=1';
      </script>

    <?php
    }
    ?>
    <script type='text/javascript'>
    	alert('The User number <?php echo $_POST['member_no'];?> has been modified!');
    </script>
    <script type='text/javascript'>
    	window.location = 'admin.php?mode=0';
    </script>
  <?php
  }
  else if($_POST['mode'] == 2){
    echo $_POST['plate'];
    echo $_POST['location'];
    echo $_POST['driver'];

    	$q = 'SELECT * FROM van WHERE van_license_plate = "'.$_POST['plate'].'";';
      $res = $db -> query($q);
  		$result = $res->fetch_array();
      if (!$result)
  		{
  			$q = "INSERT INTO van (	location, 	driver_no, 	van_license_plate)
  						VALUES ('".$_POST['location']."', ".$_POST['driver'].",	'".$_POST['plate']."');";
  			$res = $db -> query($q);
  		}
      else{
  		  echo "
  		        <script type='text/javascript'>
  		          alert('Add van failed!, It have this plate already in database!');
  		        </script>
  		       ";
  		  echo "
  		        <script type='text/javascript'>
  		          window.location = 'admin.php?mode=0';
  		        </script>
  		       ";
  		}
?>
  <script type='text/javascript'>
    alert('Add Van Successful!');
  </script>
  <script type='text/javascript'>
    window.location = 'admin.php?mode=0';
  </script>
<?php
  }
  else if($_POST['mode'] == 3){
    $q = 'SELECT * FROM broken_equipment WHERE equipment_ID = '.$_POST['id_equip'].';';
    $res = $db -> query($q);
    $result = $res->fetch_array();
    if (!$result){
      echo "
            <script type='text/javascript'>
              alert('The Information is missing from database!');
            </script>
           ";
      echo "
            <script type='text/javascript'>
              window.location = 'brokenEquip.php?mode=0';
            </script>
           ";
    }
    else{
      if(isset($_POST['assign_name'])){
        $q = 'UPDATE broken_equipment SET     equipment_status ="'.$_POST['status_change'].'",
                                              equipment_assign ='.$_POST['assign_name'].'
                            WHERE   equipment_ID ='.$_POST['id_equip'].';';
      }
      else{
        $q = 'UPDATE broken_equipment SET     equipment_status ="'.$_POST['status_change'].'"
                            WHERE   equipment_ID ='.$_POST['id_equip'].';';
      }
      $res = $db -> query($q);
    }
?>
<script type='text/javascript'>
  alert('Successful Modified, Thank!!');
</script>
<script type='text/javascript'>
  window.location = 'brokenEquip.php?mode=0';
</script>

<?php
  }
  else if($_POST['mode'] == 4){
    $q = 'INSERT INTO request (request_date, request_from, request_to, request_to_place, request_description, request_by)
                              VALUES ("'.$_POST['date_select'].'",
                                      "'.$_POST['from_time'].'",
                                      "'.$_POST['to_time'].'",
                                      "'.$_POST['destination'].'",
                                      "'.$_POST['description'].'",
                                      '.$_POST['request_by'].');';
    $res = $db -> query($q);
?>
<script type='text/javascript'>
  alert('Your have request the Van complete, Please see the history for the status!!');
</script>
<script type='text/javascript'>
  window.location = 'member.php?mode=0';
</script>
<?php
  }
  else if($_POST['mode'] == 5){

    $status_check = True;
    $q = 'SELECT * FROM request WHERE request_assign = '.$_POST['assign_to'].' AND request_date = "'.$_POST['date_check'].'";';
    $res = $db -> query($q);
    while($row = $res -> fetch_array()){
      if( $_POST['start_check'] >= $row['request_from'] && $_POST['start_check'] <= $row['request_to']){
        $status_check = FALSE;
      }else if($_POST['start_check'] < $row['request_from'] && $_POST['end_check'] <= $row['request_to']){
        $status_check = FALSE;
      }
    }

    if(isset($_POST['assign_to']) && $status_check){
      $q = 'UPDATE request SET      request_assign ='.$_POST['assign_to'].',
                                    request_assign_by ='.$_POST['assign_by'].',
                                    request_approve ="Accepted",
                                    request_comment ="'.$_POST['comment'].'"
                          WHERE   request_no ='.$_POST['request_number'].';';
      $res = $db -> query($q);
    }else if(!$status_check){
?>
      <script type='text/javascript'>
        alert("You can't confirm because this van have work at that time already!");
      </script>
      <script type='text/javascript'>
        window.location = 'member.php?mode=2';
      </script>
      <?php
    }else{
?>
      <script type='text/javascript'>
        alert("You can't confirm because you didn't choose the Van to assign!");
      </script>
      <script type='text/javascript'>
        window.location = 'member.php?mode=2';
      </script>
<?php
    }
?>
<script type='text/javascript'>
  alert("You assign work success!");
</script>
<script type='text/javascript'>
  window.location = 'member.php?mode=2';
</script>


<?php
  }
  else if($_POST['mode'] == 6){
    $q = 'UPDATE request SET      request_assign_by ='.$_POST['assign_by'].',
                                  request_approve ="Decline",
                                  request_comment ="Please, contact ground division for more information"
                         WHERE    request_no ='.$_POST['request_number'].';';
    $res = $db -> query($q);
?>
<script type='text/javascript'>
  alert("You decline success!");
</script>
<script type='text/javascript'>
  window.location = 'member.php?mode=2';
</script>
<?php
  }
  else if($_POST['mode'] == 7){
    $q = "DELETE FROM request where request_no = ".$_POST['request_number'].";";
    if(!$db->query($q)){
      echo "DELETE failed. Error: ".$mysqli->error ;
    }
    $db->close();
?>
<script type='text/javascript'>
  alert("You Cancel This Order!!");
</script>
<script type='text/javascript'>
  window.location = 'member.php?mode=0';
</script>
<?php
  }
  else if($_POST['mode'] == 8){

    $q = 'SELECT * FROM member, driver, van WHERE    member.member_id= '.$_POST['confirm_by'].'
                                          AND   driver.member_id = member.member_id
                                          AND   van.driver_no = driver.driver_no;';

    $res = $db -> query($q);
    while($row = $res -> fetch_array()){
      $van_confirm = $row['van_no'];
      $driver_confirm = $row['driver_no'];
    }
    $q = 'INSERT INTO data_information (data_date, data_distance, data_passanger, data_from, data_to, driver_no, driver_van_num)
                              VALUES ("'.$_POST['data_date'].'",
                                      '.$_POST['distance'].',
                                      '.$_POST['passenger'].',
                                      "'.$_POST['place_from'].'",
                                      "'.$_POST['place_to'].'",
                                      '.$driver_confirm.',
                                      '.$van_confirm.');';
    $res = $db -> query($q);
    if(isset($_POST['requester'])){
      if($_POST['requester'] = " "){
        $q = 'UPDATE van SET          status ="'.$_POST['status'].'",
                                      location ="'.$_POST['current_locate'].'",
                                      request_by = "No Requested"
                             WHERE    van_no ='.$van_confirm.';';
      }
      else{
      $q = 'UPDATE van SET          status ="'.$_POST['status'].'",
                                    location ="'.$_POST['current_locate'].'",
                                    request_by = "'.$_POST['requester'].'"
                           WHERE    van_no ='.$van_confirm.';';
      }
    }else{
      $q = 'UPDATE van SET          status ="'.$_POST['status'].'",
                                    location ="'.$_POST['current_locate'].'",
                                    request_by = "No Requested"
                           WHERE    van_no ='.$van_confirm.';';
    }
    $res = $db -> query($q);
?>
<script type='text/javascript'>
  alert("ํThank you for submit your report!");
</script>
<script type='text/javascript'>
  window.location = '.';
</script>
<?php
  }
  else if($_POST['mode'] == 9){
    $q = 'UPDATE member SET       full_name ="'.$_POST['f_name'].'",
                                  username = "'.$_POST['u_name'].'",
                                  email ="'.$_POST['e_mail'].'",
                                  member_tele = "'.$_POST['tele_num'].'"
                         WHERE    member_id ='.$_POST['u_num'].';';
    $res = $db -> query($q);
    $_SESSION['fname'] = $_POST['f_name'];
    $_SESSION['user_name'] = $_POST['u_name'];
    $_SESSION['e_mail'] = $_POST['e_mail'];
    $_SESSION['tele_number'] = $_POST['tele_num'];
?>
<script type='text/javascript'>
  alert('Your Profile has been change!');
</script>
<script type='text/javascript'>
  window.location = '.';
</script>
<?php
  }else if($_POST['mode'] == 10){
    $cal_mile = abs($_POST['end_mile'] - $_POST['start_mile']);
    $q = 'UPDATE request SET      request_status = 1,
                                  request_mile = '.$cal_mile.',
                                  request_passenger ='.$_POST['passen_num'].',
                                  request_init_place = "'.$_POST['init_place'].'"
                         WHERE    request_no ='.$_POST['request_no'].';';
    $res = $db -> query($q);
?>
<script type='text/javascript'>
  alert('Report Sucessful, Please wait the requester to confirm!');
</script>
<script type='text/javascript'>
  window.location = 'member.php?mode=3';
</script>
<?php
  }else if($_POST['mode'] == 11){
    $q = 'UPDATE request SET      request_status = 2
                         WHERE    request_no ='.$_POST['request_no'].';';
    $res = $db -> query($q);
    $q = 'SELECT * FROM request, van WHERE  request_no ='.$_POST['request_no'].' AND
                                            request.request_assign = van.van_no;';
    $res = $db -> query($q);
    while($row = $res -> fetch_array()){
      $van_number = $row['van_no'];
      $driver_number = $row['driver_no'];
    }
    $q = 'INSERT INTO data_information (data_date, data_distance, data_passanger, data_from, data_to, driver_no, driver_van_num)
                              VALUES ("'.$_POST['request_date'].'",
                                      '.$_POST['request_kilo'].',
                                      '.$_POST['request_passenger'].',
                                      "'.$_POST['request_init'].'",
                                      "'.$_POST['request_to'].'",
                                      '.$driver_number.',
                                      '.$van_number.');';
    $res = $db -> query($q);
?>
<script type='text/javascript'>
  alert('You confirm successful! Thank you for submit it.');
</script>
<script type='text/javascript'>
  window.location = 'member.php?mode=5';
</script>
<?php
  }else if($_POST['mode'] == 12){

    $date_post_start = $_POST['start_date'];
    $date_post_end = $_POST['end_date'];

    while($date_post_start <= $date_post_end){
      $q = 'INSERT INTO request ( request_date,
                                  request_from,
                                  request_to,
                                  request_to_place,
                                  request_description,
                                  request_approve,
                                  request_assign,
                                  request_assign_by,
                                  request_by)
                                VALUES ("'.$date_post_start.'",
                                        "'.$_POST['from_time'].'",
                                        "'.$_POST['to_time'].'",
                                        "'.$_POST['destination'].'",
                                        "'.$_POST['description'].'",
                                        "Accepted",
                                        '.$_POST['assign_to'].',
                                        0,
                                        0);';
      $res = $db -> query($q);
      $date_post_start = date('Y-m-d', strtotime("+1 day", strtotime($date_post_start)));
    }


?>
<script type='text/javascript'>
  alert('You have assign weekly work to van number <?php echo $_POST['assign_to'];?>.');
</script>
<script type='text/javascript'>
  window.location = 'admin.php?mode=2';
</script>
<?php
  }else if($_POST['mode'] == 13){
    $q = 'UPDATE request SET      request_status = 0
                         WHERE    request_no ='.$_POST['request_no'].';';
    $res = $db -> query($q);
?>
<script type='text/javascript'>
  alert('You have decline the report, please wait driver to submit it again.');
</script>
<script type='text/javascript'>
  window.location = 'admin.php?mode=5';
</script>
<?php
  }else if($_POST['mode'] == 14){
    $q = 'INSERT INTO stock (stock_name, stock_total, stock_lot, stock_docnum, stock_price, stock_com, stock_place, stock_totalp)
                              VALUES ("'.$_POST['stock_name'].'",
                                      '.$_POST['stock_total'].',
                                      "'.$_POST['date_select_stock'].'",
                                      "'.$_POST['stock_docnum'].'",
                                      '.$_POST['stock_price'].',
                                      "'.$_POST['stock_com'].'",
                                      "'.$_POST['stock_place'].'",
                                      '.$_POST['stock_totalp'].');';
    $res = $db -> query($q);
  ?>
  <script type='text/javascript'>
  alert('คุณทำรายการสำเร็จแล้ว');
  </script>
  <script type='text/javascript'>
  window.location = 'manage_stock.php?mode=0';
  </script>
<?php
  }else if($_POST['mode'] == 15){
    for($i = 0 ; $i < count($_SESSION['array_withdraw']); $i++){
      $q = 'SELECT * FROM stock WHERE stock_id = "'.$_SESSION['array_withdraw'][$i]['stock_num'].'";';
      $res = $db -> query($q);
      while($row = $res -> fetch_array()){
        $stock_use = $row['stock_total'];
        $stock_use = $stock_use - $_SESSION['array_withdraw'][$i]['total'];
        if($stock_use < 0){
          $_SESSION['array_withdraw'] = array();
  ?>
          <script type='text/javascript'>
          alert('ของในสต็อกมีไม่พอ');
          </script>
          <script type='text/javascript'>
          window.location = 'manage_stock.php?mode=0';
          </script>
  <?php
        }
        $q1 = 'UPDATE stock SET      stock_total = '.$stock_use.'
                           WHERE    stock_id ='.$_SESSION['array_withdraw'][$i]['stock_num'].';';
        $res1 = $db -> query($q1);
        $_SESSION['array_withdraw'] = array();
      }
    }
  ?>

  <script type='text/javascript'>
  alert('คุณทำรายการสำเร็จแล้ว');
  </script>
  <script type='text/javascript'>
  window.location = 'manage_stock.php?mode=0';
  </script>

<?php
  }
?>

<script type='text/javascript'>
  alert('The User number <?php echo $_POST['member_no'];?> has been modified!');
</script>
<script type='text/javascript'>
  window.location = 'admin.php?mode=1';
</script>
