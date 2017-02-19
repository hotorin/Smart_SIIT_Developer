<?php
require_once('connect.php');
session_start();

//----------------------------------------------------------------------------------------------------------------------//
if(isset($_POST['username']) && isset($_POST['password'])){
		$q = 'SELECT * FROM member WHERE username = "'.$_POST['username'].'" AND password = "'.md5($_POST['password']).'";';
		$res = $db -> query($q);
		if ($res && $res->num_rows == 1 ){
			while($row = $res -> fetch_array()){
					$_SESSION['user_no'] = $row['member_id'];
					$_SESSION['fname'] = $row['full_name'];
					$_SESSION['user_name'] = $row['username'];
					$_SESSION['user_pass'] = $row['password'];
					$_SESSION['e_mail'] = $row['email'];
					$_SESSION['tier'] = $row['member_tier'];
					$_SESSION['tele_number'] = $row['member_tele'];
			}
		}
		else{
		  echo "
		        <script type='text/javascript'>
		          alert('Login Failed, Your username or password is invalid!');
		        </script>
		       ";
		  echo "
		        <script type='text/javascript'>
		          window.location = 'login.php';
		        </script>
		       ";
		}
}
//-----------------------------------------------------------------------------------------------------------------------//
?>
<script type='text/javascript'>
	alert('Login Success!');
</script>
<script type='text/javascript'>
	window.location = '.';
</script>
