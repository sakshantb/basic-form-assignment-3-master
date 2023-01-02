<?php
// create database connectivity  
include "connection.php";
if (isset($_GET['delete'])) {
    // below id comes from ajax data attribute (data:delete:id)
    $deleteId = $_GET['delete'];
    echo $deleteId;
    // check record exists  
    $sql = "SELECT * FROM mydb WHERE id = '$deleteId' ";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // Delete record from users table  
        $delete = "DELETE FROM mydb WHERE id = $deleteId";
        $deletequery = mysqli_query($db, $delete);
        if ($deletequery) {
            echo 1;
            exit();
        } else {
            echo 0;
            exit();
        }
    }
}
