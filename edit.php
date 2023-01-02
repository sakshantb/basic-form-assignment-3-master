<?php
// create database connectivity  
include "connection.php";
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
}
// fetch data from student table..  
$sql = "SELECT * FROM mydb WHERE id = {$editId}";
$query = $db->query($sql);
if ($query->num_rows > 0) { 
    // $output = "";  
    while ($row = $query->fetch_assoc()) { ?>
        <form action="" id="uform" method="POST" enctype="multipart/form-data">
            <label for=""> id:</label>
            <input type="hidden" id="editid"  value="<?php echo $row['id']; ?>"><br>
            <label for=""> name:</label>
            <input type="text" id="editname" name="name" value="<?php echo $row['name']; ?>"><br>
            <label for="">email:</label>
            <input type="email" id="editemail" name="email"  value="<?php echo $row['email']; ?>"><br>
            <label for="">password:</label>
            <input type="password" id="editpassword" name="password"  value="<?php echo $row['password']; ?>"><br>
            <input type="submit" name="update"  id="update">

        </form>
<?php
    }
}
// echo $output;  
include "connection.php";
if(isset($_POST['update'])){
    $uuser=$_POST['name '];
    $uemail=$_POST['email'];
    $upass=$_POST['password'];
    $uinsert= "UPDATE `mydb` SET `name`='$uuser',`email`='$uemail',`password`='$upass' WHERE id=$editId";
    $uquery= mysqli_query($db,$uinsert);
    if($uquery){
        echo "data updated";
        header("location:read.php");
    }
}
?>