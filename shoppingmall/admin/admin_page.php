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
        <center></center>
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
    </body>
</html>