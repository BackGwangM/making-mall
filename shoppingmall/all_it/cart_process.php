<?php
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["pw"]))
    {
        $cart_v = $_GET["cart_value"];
    $cart_arr = array();
    
    
    if(isset($_SESSION["cart"]) == 1)
    {   
        $cart_arr = $_SESSION["cart"];
                array_push($cart_arr, $cart_v);
                $_SESSION["cart"] = $cart_arr;
                echo '<script>
        location.href="http://localhost/homework_3/homework_4/index.php";
        </script>';
    }
    else{        
        array_push($cart_arr, $cart_v);
        $_SESSION["cart"] = $cart_arr;
        echo '<script>
        location.href="http://localhost/homework_3/homework_4/index.php";
        </script>';
    }
}
    else{
        echo '<script>alert("로그인 후 이용해 주십시오!");
        location.href="http://localhost/homework_3/homework_4/login.php";
        </script>';
    }
    
?>