<?php
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "worktest");
    if($_POST["id"] != '')
    {
        $id = $_POST["id"];
    }
    if($_POST["pw"] != '')
    {
    $pw = $_POST["pw"];
    }

    $sql = "SELECT * FROM user_id WHERE id = '".$id."' && pw = '".$pw."';";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0 && $_POST["id"] != '' && $_POST["pw"] != '')
    {
        $sql = "SELECT * FROM user_id;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["id"] = $_POST["id"];
        $_SESSION["pw"] = $_POST["pw"];
        echo '<script>alert("성공적으로 로그인 되었습니다!");
        location.href="http://localhost/homework_3/homework_4/index.php";</script>';
    }
    else if($result->num_rows == 0){
        echo "
        <script> 
        window.alert('ID나 PASSWORD가 잘못 되었습니다. 확인 또는 회원가입을 시도해 보시길 권합니다.');
        history.back(); 
        </script>";
    }
?>