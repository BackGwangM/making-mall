<?php
    session_start();
    $drop = $_GET["delete_number"];
    $cart = $_SESSION['cart'];
    
    if(sizeof($cart)/4 == 1)
    {
        unset($_SESSION['cart']);
    }
    else{
        unset($cart[$drop]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }
    

    echo '<script>location.href="cart.php";</script>';
?>