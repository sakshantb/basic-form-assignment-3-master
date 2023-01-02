<?php
// create database connectivity  
include "connection.php";
// fetch data from student table..  
$sql = "SELECT * FROM mydb";
$query = $db->query($sql);
$num = mysqli_num_rows($query);
if ($num > 0) { ?>
    <!-- <table id="#table" class='table table-hover table-striped'> -->
        <thead id="thead">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Profile Picture</th>
                <th colspan='3'>Action</th>
            </tr>
        </thead> <?PHP
                    while ($row = mysqli_fetch_array($query)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo "<img src='$row[pic]' height='50px' width='50px'>"; ?></td>
                    <td><button class='btn btn-danger btn-sm delete-btn' id="deletebutton" data-deleteid=<?php echo $row['id'] ?>>Delete</button></td>
                </tr>
            </tbody>
        <?PHP  }  ?>

    <!-- </table> -->
<?PHP  } else {
}


