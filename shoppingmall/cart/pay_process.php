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
?>
<!DOCTYPE>
<html>
    <meta charset="utf8">
    <title></title>
    <body>
        <?php
            echo '<script>
        var up;
        up = confirm("'.$_POST['total'].'원을 결제 하시겠습니까?");

        if(up)
        {   
            INSERT INTO `order_history` (`id`, `name`, `adress`, `e-mail`, `product`, `order_date`,`total_price`) VALUES("'.$_SESSON["id"].'","'.$_POST["name"].'","'.$_POST["adress"].'", "'.$_POST["e-mail"].'","'.$_SESSON["cart"].'", "now()", "'.$_POST["total"].'");
            alert("'.$_POST['total'].'원을 결제 합니다!");
            location.href="../index.php?cartset=1";
        }
        else{
            alert("결제를 취소합니다!");
            location.href="../index.php";
        }
        </script>';
        ?>
        
        
    </body>
</html>