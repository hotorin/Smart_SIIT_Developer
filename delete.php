<?php

  require_once('connect.php');

  if($_POST['mode'] == 0){
    if(isset($_POST['id'])){
        $q = "DELETE FROM member where member_ID = ".$_POST['id'].";";
        if(!$db->query($q)){
          echo "DELETE failed. Error: ".$mysqli->error ;
        }
        $db->close();
      }
  }
  else if($_POST['mode'] == 1){
    if(isset($_POST['van_no'])) {
      $q = "DELETE FROM van where van_no = ".$_POST['van_no'].";";
      echo $q;
      if(!$db->query($q)){
        echo "DELETE failed. Error: ".$mysqli->error ;
      }
      $db->close();
    }
    echo "
    <script type='text/javascript'>
      alert('Delete Success');
    </script>
    <script type='text/javascript'>
      window.location = 'admin.php?mode=0';
    </script>
    ";

  }
?>

<script type='text/javascript'>
  alert('Delete Success');
</script>
<script type='text/javascript'>
  window.location = 'admin.php?mode=1';
</script>
