<?php
require_once('connect.php');
session_start();
?>
<?php
$target_dir = "resource/report_picture/";
$target_file = $target_dir . date("_Y-m-d_H_i_s.") . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      ?>
            <script type='text/javascript'>
              alert("File is not an image.");
            </script>
            <script type='text/javascript'>
              window.location = '.';
            </script>
      <?php
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
  echo $target_file;
  ?>
        <script type='text/javascript'>
          alert("Sorry, file already exists.");
        </script>
        <script type='text/javascript'>
          window.location = '.';
        </script>
  <?php
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  ?>
        <script type='text/javascript'>
          alert("Sorry, your file is too large.");
        </script>
        <script type='text/javascript'>
          window.location = '.';
        </script>
  <?php
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  ?>
        <script type='text/javascript'>
          alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        </script>
        <script type='text/javascript'>
          window.location = '.';
        </script>
  <?php
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
?>
      <script type='text/javascript'>
        alert("Sorry, your file was not uploaded.");
      </script>
      <script type='text/javascript'>
        window.location = '.';
      </script>
<?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

			$q  = "INSERT INTO broken_equipment(equipment_name,
												equipment_campus,
												equipment_building,
												equipment_room,
												equipment_decription,
												equipment_username,
												equipment_email,
												equipment_photo,
                        equipment_date_s)
										VALUE	('".$_POST['Ename']."',
												'".$_POST['Campus']."',
												'".$_POST['Building']."',
												'".$_POST['Room']."',
												'".$_POST['Description']."',
												'".$_POST['Name']."',
												'".$_POST['Email']."',
												'".$target_file."',
                        '".date("Y-m-d")."');";
			$res = $db -> query($q);

?>
        <script type='text/javascript'>
          alert("The file has been uploaded.");
        </script>
        <script type='text/javascript'>
          window.location = '.';
        </script>
<?php
    } else {
?>
        <script type='text/javascript'>
          alert("Sorry, there was an error uploading your file.")
        </script>
        <script type='text/javascript'>
          window.location = '.';
        </script>
<?php
    }
}
?>

<?php
/* $q  = "INSERT INTO broken_equipment(equipment_name,
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
$res = $db -> query($q); */

?>
<!--
<script type='text/javascript'>
	alert('Thanks for submition');
</script>
<script type='text/javascript'>
	window.location = 'http://localhost/Smart_SIIT/broken_index.php';
</script>
-->
