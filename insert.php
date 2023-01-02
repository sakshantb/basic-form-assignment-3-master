<?php
//DB Connection 

include "connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$file = $_FILES['file'];

// image uploading
if ($_FILES['file']['name']) {

    move_uploaded_file($_FILES['file']['tmp_name'], "photo/" . $_FILES['file']['name']);

    $img = "photo/" . $_FILES['file']['name'];
}

$insert = "INSERT INTO `mydb`(`name`, `email`,`password`,`pic`) VALUES ('$name','$email', '$password','$img ')";

$query = mysqli_query($db, $insert);
if ($query) {
}
