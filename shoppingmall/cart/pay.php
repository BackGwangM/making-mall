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
            <center><a href="../index.php"><img src="../1.png" alt="<h1>월로서점</h1>" width="100px"></a>
        <h2>결제 진행</h2><br>
        </div>
         <table style = "margin-top:20px;">
                <tr>
                    <td class="table" style="width : 50px;">No</td>
                    <td colspan="2" class="table" style="width : 600px;">책 제목</td>
                    <td class="table" style="width : 100px;">가격</td>
                    <td class="table" style="width : 100px;">글쓴이</td>
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
                    <td style="text-align: center;" ><img src=".'$row["image_src"]'." alt="50px">.</td>
                    <td style="text-align: center;" >'.$row["name"].'</td>
                    <td style="text-align: right;" >'.$row["price"].'</td>
                    <td style="text-align: center;">'.$row["author"].'</td>
                    </tr>
                    <tr>
                    <td colspan="5"><hr style="color: gray"></td>
                    <tr>
                    ';
                }
                ?>
            </table>
            <div id="popup">
            <div style="display: table;">
                <div id = "top" style="text-align: center; display: table-cell; vertical-align: middle; font-size=60px">
                    주문 내역
                </div>
            </div>
                
            </div>
            <script>
            $(window).scroll(function(){ 
                if ($(window).scrollTop() == $(document).height() - $(window).height()) 
                { 
                    
                } });​
            </script>  

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>