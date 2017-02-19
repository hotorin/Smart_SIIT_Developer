<?php
require_once('connect.php');
session_start();

$q  = "INSERT INTO broken_equipment(equipment_name,
									equipment_campus,
									equipment_building,
									equipment_room,
									equipment_decription,
									equipment_username,
									equipment_email)
							VALUE	('".$_POST['Ename']."',
									'".$_POST['Campus']."',
									'".$_POST['Building']."',
									'".$_POST['Room']."',
									'".$_POST['Description']."',
									'".$_POST['Name']."',
									'".$_POST['Email']."');";
$res = $db -> query($q);

?>

<script type='text/javascript'>
	alert('Thanks for submition');
</script>
<script type='text/javascript'>
	window.location = 'http://localhost/Smart_SIIT/broken_index.php';
</script>
