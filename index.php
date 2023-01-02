<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="row">
        <div id="col" class="col" style="display: flex;justify-content: center;">
            <a href="export.php" id="export" style="text-decoration: none;">download</a>
            <div class="" id="formdiv">
                <form action="" id="form" method="POST" enctype="multipart/form-data" style="display:inline-block;padding-left:4.5rem">

                    <label for=""> name:</label>
                    <input type="text" id="name" name="name" value=""><br>
                    <label for="">email:</label>
                    <input type="email" id="email" name="email" value=""><br>
                    <label for="">password:</label>
                    <input type="password" id="password" name="password" value=""><br>
                    <label for="">profile pictute:</label>
                    <input type="file" id="file" name="file" value="Doe"><br><br>
                    <input type="submit" value="Submit" name="submit" id="submit">
                </form>
                <br>
                <br><br><br>
                <form method="post" id="excel" action="" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" />
                    <h4>(note:import only csv file)</h4><br>
                    <input type="submit" id="excelbutton" name="excel" value="import" />

                </form>
            </div>
            <div class="col" id="tablediv">
                <div class="tablediv">
                    <form action="">
                        <label for="" id="searchinput">search name or id:</label>
                        <input type='text' class='form-control' id='search' value="">
                    </form>
                    <table id="table">
                    </table>
                </div>
            </div>
        </div>
        <!-- ajax start from here -->
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="excel.js"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {

                function showdata() {
                    $.ajax({
                        url: "read.php",
                        type: "GET",
                        success: function(data) {
                            // console.log(data);
                            $("#table").html(data);
                        }
                    })
                }
                showdata();
                //                insert data from here                
                $("#form").on('submit', (function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "insert.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            alert("Data inserted successfully");
                            $("#form")[0].reset()
                            showdata();
                        },
                        // error: function(){}
                    });
                }));
                showdata();
                // Delete record to MySql from PHP using jQuery AJAX  
                $("#table").on("click", ".delete-btn", function() {
                    if (confirm("Are you sure delete this ?")) {
                        var id = $(this).data('deleteid');
                        console.log(id);
                        var element = this;
                        $.ajax({
                            url: "delete.php",
                            type: "GET",
                            data: {
                                delete: id
                            },
                            success: function(data) {
                                if (data = 1) {
                                    $(element).closest("tr").fadeOut();
                                    alert("User record deleted successfully");
                                } else {
                                    alert("Invalid User id");
                                }
                            }
                        });
                    }
                });
                $("#excel").on('submit', (function(e) {
                    e.preventDefault();
                    console.log('clicked');
                    $.ajax({
                        url: "import.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            showdata();
                            alert("Data inserted successfully");
                        },
                      
                    });
                    showdata();
                }));
                showdata();
                $("#search").on("keyup", function() {
                    var search = $(this).val();
                    $.ajax({
                        url: "search.php",
                        type: "GET",
                        data: {
                            search: search
                        },
                        success: function(data) {
                            $("#table").html(data);
                        }
                    })
                })
            });
        </script>
</body>

</html>