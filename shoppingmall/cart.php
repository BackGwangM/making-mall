<?php
    session_start();
    if(isset($_SESSION['id']) != 1 && isset($_SESSION['pw']) != 1)
    {
        echo '<script>alert("로그인 후 이용해 주십시오!");
        location.href="http://localhost/homework_3/homework_4/login.php";</script>';
    }
    elseif(isset($_SESSION['cart']) != 1)
    {
        echo '<script>alert("장바구니에 들어 있는 상품이 없습니다.");
        location.href="http://localhost/homework_3/homework_4/index.php";</script>';
    }
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "worktest");
    $arr = $_SESSION['cart'];
    $total = 0;
?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf8">
        <title>장바구니</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/homework_3/homework_4/main.css">
    </head>
    <body>
        <div id="head">
            <center><a href="index.php"><img src="1.png" alt="<h1>월로서점</h1>" width="180px"></a>
        <h2>장바구니</h2><br>
        </center>
        </div>
        <center>
        <form action="pay.php" method="POST">
            <table border="1" style = "margin-top:50px;">
                <tr>
                    <td class="table" style="width : 50px;">No</td>
                    <td class="table" style="width : 500px;">책 제목</td>
                    <td class="table" style="width : 100px;">가격</td>
                    <td class="table" style="width : 100px;">글쓴이</td>
                </tr>
                
                <?php
                for($i = 0; $i < sizeof($arr); ++$i)
                {
                    $sql = "SELECT * FROM product WHERE no = '".$arr[$i]."';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = $total + $row["price"];
                    echo '<tr>
                    <td style="text-align: center;" >'.($i+1).'</td>
                    <td style="text-align: center;" >'.$row["name"].'</td>
                    <td style="text-align: right;" >'.$row["price"].'</td>
                    <td style="text-align: center;">'.$row["author"].'</td>
                    </tr>';
                }
                ?>
                <input type="hidden" value="<?php echo $total ?>" name="total">
                
            </table>
            <input type="submit" class="btn btn-success" value="구매" style="margin-top: 50px;">
            </form>
        </center>
    </body>
</html>