<?php
    session_start();
    $arr = $_SESSION['cart'];
    if(isset($_SESSION['id']) != 1 && isset($_SESSION['pw']) != 1)
    {
        echo '<script>alert("로그인 후 이용해 주십시오!");
        location.href="../login.php";</script>';
    }
    elseif(isset($_SESSION['cart']) != 1 || sizeof($arr)==0)
    {
        echo '<script>alert("장바구니에 들어 있는 상품이 없습니다.");
        location.href="../index.php";</script>';
    }
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");
    
    $total = 0;
?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf8">
        <title>장바구니</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
        <div id="head">
            <center><a href="../index.php"><img src="../1.png" alt="<h1>월로서점</h1>" width="180px"></a>
        <h2>장바구니</h2><br>
        </center>
        </div>
        <center>
            <table border="1" style = "margin-top:50px;">
                <tr>
                    <td class="table" style="width : 50px;">No</td>
                    <td class="table" style="width : 500px;">책 제목</td>
                    <td class="table" style="width : 100px;">가격</td>
                    <td class="table" style="width : 100px;">글쓴이</td>
                    <td>삭제</td>
                </tr>
                
                <?php
                for($i = 0; $i < sizeof($arr); ++$i)
                {
                    $sql = "SELECT * FROM book_data WHERE no = '".$arr[$i]."';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = $total + $row["price"];
                    echo '<tr>
                    <td style="text-align: center;" >'.($i+1).'</td>
                    <td style="text-align: center;" >'.$row["name"].'</td>
                    <td style="text-align: right;" >'.$row["price"].'</td>
                    <td style="text-align: center;">'.$row["author"].'</td>
                    <td><a href="cart_delete.php?delete_number='.$i.'"><input type="button" value="삭제" class="btn btn-warning"></a></td>
                    </tr>';
                }
                ?>
                <input type="hidden" value="<?php echo $total ?>" name="total">
            </table>
            <a href="pay.php"><input type="button" class="btn btn-success" value="구매" style="margin-top: 50px;"></a>
        </center>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>