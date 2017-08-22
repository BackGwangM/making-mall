<?php
    if(isset($_SESSION["id"]) && isset($_SESSION["pw"]))
    {
        $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "worktest");
    if($_SESSION["id"] != '')
    {
        $id = $_SESSION["id"];
    }
    if($_SESSION["pw"] != '')
    {
    $pw = $_SESSION["pw"];
    }

    $sql = "SELECT * FROM user_id WHERE id = '".$id."' && pw = '".$pw."';";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0 && $id != '' && $pw != '')
    {
        $sql = "SELECT * FROM user_id;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["id"] = $_POST["id"];
        $_SESSION["pw"] = $_POST["pw"];
    }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>로그인 페이지</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/homework_3/homework_4/login_style.css">
</head>
<body>
    <div id = "main" >
        <h1>월로서점 로그인</h1>
    <form action="http://localhost/homework_3/homework_4/loginprocess.php" method="POST">
        <p><input type="text" placeholder="아이디" name="id" maxlength="20" size=25px required> </p>
        <p><input type="password" placeholder="비밀번호" name="pw" maxlength="16" size=25px required></p>
        <a href="http://localhost/homework_3/homework_4/join.php"><input type="button" name="회원가입" value="회원가입" class = "btn btn-info"></a>
        <input type="submit" name="로그인" value="로그인" class="btn btn-success">
    </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <p id="error">크롬, 오페라 환경에 최적화된 웹페이지입니다. 엣지, 익스플로러, 파이어폭스에서는 깨진 화면이 보일 수 있습니다.</p>
</body>
</html>