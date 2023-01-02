<?php
include("connection.php");
$search = $_GET['search'];
$sql = "SELECT * FROM mydb WHERE name LIKE '%{$search}%' OR id LIKE '%{$search}%'  ";
$query = $db->query($sql);
if ($query->num_rows > 0) { ?>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Profile Picture</th>
                <th colspan='3'>Action</th>
            </tr>
        </thead> <?PHP
                    while ($row = $query->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo "<img src='$row[pic]' height='50px' width='50px'>"; ?></td>
                    <td><button class='btn btn-danger btn-sm delete-btn' data-deleteid=<?php echo $row['id'] ?>>Delete</button></td>
                </tr>
            </tbody>
        <?PHP  }  ?>
    </table>
<?PHP  } else {
    echo "<h5>No record found</h5>";
}
?>