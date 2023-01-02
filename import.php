<?php
include "connection.php";
// if(isset($_POST["submit_file"]))

// {

 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
    $name= $csv[0];
    $email = $csv[1];
    $password=$csv[2];
    $img=$csv[3];
 
  $insert = "INSERT INTO `mydb`(`name`, `email`,`password`,`pic`) VALUES ('$name','$email', '$password','$img ')";

$query = mysqli_query($db, $insert);
if ($query) {
}
 }
//  }
