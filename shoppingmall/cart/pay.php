<?php
    session_start();
    if(isset($_SESSION['id']) != 1 && isset($_SESSION['pw']) != 1)
    {
        echo '<script>alert("로그인 후 이용해 주십시오!");
        location.href="./login/login.php";</script>';
    }
    elseif(isset($_SESSION['cart']) != 1)
    {
        echo '<script>alert("장바구니에 들어 있는 상품이 없습니다.");
        location.href="./index.php";</script>';
    }
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");
    $arr = $_SESSION['cart'];
    $total = 0;
?>
<html>
    <head>
    <meta charset="utf8">
    <title>결제 진행 중... <?php echo $_POST['total']?>원</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
        <div id="head">
            <center><a href="../index.php"><img src="../1.png" alt="<h1>월로서점</h1>" width="200px"></a>
        <h2>결제 진행</h2><br>
        </div>
         <form action="pay_process.php" method="POST">
                <center>
                <table style = "margin-top:20px;">
                <tr>
                    <td class="table" style="width : 50px;">No</td>
                    <td colspan="2" class="table" style="width : 600px;">책 제목</td>
                    <td class="table" style="width : 100px;">글쓴이</td>
                    <td class="table" style="width : 100px;">가격</td>
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
                    <td style="text-align: center;" ><img src="'.$row["image_src"].'" height="100px">.</td>
                    <td style="text-align: center;" >'.$row["name"].'</td>
                    <td style="text-align: center;  padding-left: 50px;">'.$row["author"].'</td>
                    <td style="text-align: right;" >'.$row["price"].' 원</td>
                    </tr>
                    <tr>
                    <td colspan="5"><hr style="color: gray"></td>
                    <tr>
                    ';
                }
                ?>
                <tr>
                    <td colspan="4" style="text-align: center;" ><h5>total</h5></td>
                    <td style="text-align: right;"><?php echo $total;?> 원</td>
                </tr>
            </table>
            <br>
            <?php 
            $sql = "SELECT * FROM member_data WHERE id = '".$_SESSION['id']."';"; 
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <table>
                <tr>
                    <td style="padding-right: 200px;">배송 받으실 분</td>
                    <td style="padding-bottom: 25px; padding-top: 25px;"><input type="text" value="<?php echo $row['name']?>" name="name" require/></td>
                    <tr>
                    <td>배송지</td>
                    <td style="padding-bottom: 25px; padding-top: 25px;"><input type="text" value="<?php echo $row['adress']?>" name="adress" size="50" require/></td>
                    </tr>
                    <tr></tr>
                    <td>이메일</td>
                    <td style="padding-bottom: 25px; padding-top: 25px;"><input type="text" value="<?php echo $row['e-mail']?>" name="e-mail" size="50" require/></td>
                </tr>
            </table>
            <input type="hidden" value="<?php echo $_POST['total']?>" name="total">
            <input type="submit" value="결제" class="btn btn-success">
                </center>
            </form>
            </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>