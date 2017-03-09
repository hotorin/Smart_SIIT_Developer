<?php
  require_once('connect.php');
  session_start();
?>
<?php
$target_dir = "resource/profile_picture/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
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

      $q = 'UPDATE member SET       member_pic = "'.$target_file.'"
                           WHERE    member_id ='.$_POST['user_number'].';';
      $res = $db -> query($q);
      $_SESSION['u_pic'] = $target_file;
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
