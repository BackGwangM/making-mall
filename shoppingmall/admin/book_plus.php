<?php
    <?php
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");

    $name = $_POST["name"];

    $sql = "SELECT * FROM book_data WHERE id = '".$name."';";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0)
    {
        echo"<script>
        window.alert('중복된 아이디가 존재합니다');
        history.back();
        </script>";
        $sql = "DELETE FROM book_data WHERE created = '..';";
        $result = mysqli_query($conn, $sql);
    }
    elseif($_POST['adress'] != ' ' && $_POST['id'] == ' ' && $_POST['pw'] == ' ' && $_POST['email'] == ' ' && $_POST['name'] == ' '){
        echo"<script>
        window.alert('빠짐없이 기록해 주십시오');
        history.back();
        </script>";
        $sql = "DELETE FROM member_data WHERE created = 'now()';";
        $result = mysqli_query($conn, $sql);
    }
    else{
        $sql = "INSERT INTO member_data (`id`, `pw`, `name`, `adress`,`e-mail`, `created`) VALUES('".$_POST['id']."', '".$_POST['pw']."','".$_POST['name']."','".$_POST['adress']."', '".$_POST['email']."', now())";
        $result = mysqli_query($conn, $sql);
        echo "<script> window.alert('회원가입이 성공적으로 완료되었습니다.'); 
        location.href='../index.php';</script>";
    }
?>