<?php
    session_start();
    if(isset($_SESSION["id"]) == 0 && isset($_SESSION["pw"]) == 0 && $_SESSION["id"] == 'admin')
    {
        echo '<script>alert("권한이 없습니다!");
        history.back();
        </script>';
    }
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");
    $sql = "SELECT * FROM member_data;";
?>

<!DOCTYPE>
<html>
    <head>
        <title>운영자 페이지</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="../main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    </head>
    <body>
    <div id="head"  style="margin-bottom:10px;">
        <center>
            <a href="admin_page.php">
            <img src="../1.png" alt="<h1>월로서점</h1>" width="225px">
            </a>
            <h1>운영자 관리 페이지</h1>
        </center>
    </div>
        <center>
        <a href="admin_page.php?no=1"><input type="button" value="책 추가"></a> <a href="admin_page.php?no=2"><input type="button" value="주문기록 조회"></a>
        </center>
    
    <?php
        if(isset($_GET["no"]))
    {
        switch ($_GET["no"]) {
            case '1': 
                
                break;
            
            default:
                echo '<script>alert("잘못된 주소입니다. 이전 페이지로 돌아갑니다.");
                history.back();
                </script>';
                break;
        }
    }
    ?>

    <table></table>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>