<?php
require_once('connect.php');
session_start();
//-------------------------------- Case that all information is full = First if ----------------------------------------------------//
if(	isset($_POST['u_name']) &&
 		isset($_POST['f_name']) &&
		isset($_POST['p_word']) &&
		isset($_POST['e-mail']) &&
		isset($_POST['re_p']) &&
    isset($_POST['tele_num']))
		{
		//-------------------------------- Case that password and re-type password is not the same = Second if -------------------------//
		if($_POST['p_word'] != $_POST['re_p']){
			echo "
		        <script type='text/javascript'>
		          alert('Register Failed, Your password and retype password is not the same please try again!');
		        </script>
		       ";
		  echo "
		        <script type='text/javascript'>
		          window.location = 'register.php';
		        </script>
		       ";
		}

		$q = 'SELECT * FROM member WHERE username = "'.$_POST['u_name'].'";';
		$res = $db -> query($q);
		$result = $res->fetch_array();
		//-------------------------------- Case that username is the same = Thrid if ---------------------------------------------------//
		if (!$result)
		{
			$q = "INSERT INTO member(	full_name, 	username, 	password, 	email, member_tele)
						VALUES ('".$_POST['f_name']."','".$_POST['u_name']."',	'".md5($_POST['p_word'])."'	,'".$_POST['e-mail']."','".$_POST['tele_num']."');";
			$res = $db -> query($q);
		}
		else{
		  echo "
		        <script type='text/javascript'>
		          alert('Register Failed, Your username is used by other member please try again!');
		        </script>
		       ";
		  echo "
		        <script type='text/javascript'>
		          window.location = 'register.php';
		        </script>
		       ";
		}
}
else{
  echo "
        <script type='text/javascript'>
          alert('Register Failed, We miss some of your information please try again!');
        </script>
       ";
  echo "
        <script type='text/javascript'>
          window.location = 'register.php';
        </script>
       ";
}
//-----------------------------------------------------------------------------------------------------------------------//
?>
<script type='text/javascript'>
	alert('Register success, now you can log-in as a new member');
</script>
<script type='text/javascript'>
	window.location = '.';
</script>
