<?php
    if(isset($_GET['no']) != 1)
    {
        echo '<script>alert("잘못된 접근입니다!");
        location.href="../index.php";
        </script>';
    }
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");
    $sql = "SELECT * FROM book_data where no = $_GET['no'];";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    
?>
<!DOCTYPE>
<html>
    <head>
       <title><?php echo $row["name"]; ?></title>
       <meta charset="utf8">
    <link rel="stylesheet" type="text/css" href="book.css">
    </head>
    <body>
        
        <div id="a">
            <p align="right"><a href="../index.php"><img src="https://image.freepik.com/free-icon/x-circle_318-2105.jpg" width="50px" id="X"></a></p><br><br>
            <center>
                <div>
                    <img src="<?php echo $row['image_src']; ?>" width="200px">
                    <h1><?php echo $row["name"]; ?></h1>
                </div>
                <article>
                    <ul>
                        <li>저자 <?php echo $row["author"];?> | </li>
                        <li>출판사 <?php echo $row["author"]; ?> | </li>
                        <li>출간일  <?php echo $row["author"]; ?> | </li>
                        <li>가격  <?php echo $row["author"]; ?> 원</li>
                    </ul>

                    <h2>책 소개</h2>
                    <p style="width:50%;">
                         <?php echo $row["author"] ?>
                    </p>
                </article>
                <form method="GET" action="http://localhost/homework_3/homework_4/cart/cart_process.php">
                    <input type="hidden" name="cart_value" value=" <?php echo $_GET['no']; ?>">
                    <input type="submit" name="" value="장바구니">
                </form>
                
            </center>
        </div>
    </body>
</html>