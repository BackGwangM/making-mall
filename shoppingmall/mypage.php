<?php
    session_start();
        
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");

    if(isset($_SESSION["id"]) && isset($_SESSION["pw"]))
    {
        if($_SESSION["id"] != '')
    {
        $id = $_SESSION["id"];
    }
    if($_SESSION["pw"] != '')
    {
    $pw = $_SESSION["pw"];
    }
    }

    

    $sql = "SELECT * FROM member_data WHERE id = '".$id."' && pw = '".$pw."';";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0 && $id != '' && $pw != '')
    {
        $sql = "SELECT * FROM member_data;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    }
?>
<!DOCTYPE>
<html>
    <head>
       <title>행복한 독서, 월로서점</title>
       <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        
    </body>
</html>