<?php
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["pw"])){
        
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");
    if(isset($_GET["cartset"])==1 && $_GET["cartset"] == 1)
    {
        unset( $_SESSION['cart'] );
    }

    if($_SESSION["id"] != '')
    {
        $id = $_SESSION["id"];
    }
    if($_SESSION["pw"] != '')
    {
    $pw = $_SESSION["pw"];
    }

    $sql = "SELECT * FROM member_data WHERE id = '".$id."' && pw = '".$pw."';";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0 && $id != '' && $pw != '')
    {
        $sql = "SELECT * FROM member_data;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    }
    
    
?>

<!DOCTYPE>
<html>
    <head>
       <title>행복한 독서, 월로서점</title>
       <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/homework_3/homework_4/main.css">
    </head>
    <body>
        
        <div id="head">
            <center><a href="index.php"><img src="1.png" alt="<h1>월로서점</h1>" width="225px"></a></center>
            <div id="buttons">
                <?php     
                if(isset($_SESSION["id"]) && isset($_SESSION["pw"])&&$result->num_rows > 0 && $id != '' && $pw != '')
                {   
                    $sql = "SELECT * FROM member_data WHERE id = '".$id."' && pw = '".$pw."';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['name']."님 안녕하세요"."<br>";
                    echo '<a href="logout.php"><input type="button" class="btn btn-warning" value="로그아웃"></a> ';
                    echo '<a href="cart.php"><input type="button" class="btn btn-Info" value="장바구니"></a>';
                }
                else{
                    echo '<a href="login.php"><input type="button" value="로그인" class="btn btn-success"></a> <a href="join.php"><input type="button" value="회원가입"  class = "btn btn-info"></a>';
                }
                
                ?>
            </div>
            <hr>
        </div>
            <center>
                <div>
                    
                    </div>
                <table>
                    <tbody>
                        <tr>
                            <td><a href="./books/1.html"><img src="http://bimage.interpark.com/goods_image/2/8/5/0/268402850g.jpg"  class="td_img"></a></td>
                            <td><a href="./books/2.html"><img src="http://bimage.interpark.com/goods_image/3/0/2/2/268403022g.jpg" class="td_img"></td>
                            <td><a href="./books/3.html"><img src="http://bimage.interpark.com/goods_image/1/0/9/9/263131099g.jpg" class="td_img"></td>
                            <td><a href="./books/4.html"><img src="http://bimage.interpark.com/goods_image/9/0/7/5/256809075g.jpg" class="td_img"></td>
                            <td><a href="./books/5.html"><img src="http://bimage.interpark.com/goods_image/5/3/3/5/16865335g.jpg" class="td_img"></td>
                        </tr>
                        <tr>
                            <td class="title">기사단장 죽이기 1</td>
                            <td class="title">기사단장 죽이기 2</td>
                            <td class="title">도구와 기계의 원리 NOW</td>
                            <td class="title">언어의 온도</td>
                            <td class="title">코스모스 (특별보급판)</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table id = "last">
                    <tbody>
                        <tr>
                            <td><a href="./books/6.html"><img src="http://bimage.interpark.com/goods_image/3/7/3/1/267503731g.jpg" class="td_img"></td>
                            <td><a href="./books/7.html"><img src="http://bimage.interpark.com/goods_image/3/0/9/9/267393099g.jpg" class="td_img"></td>
                            <td><a href="./books/8.html"><img src="http://bimage.interpark.com/goods_image/2/7/6/3/260042763g.jpg" class="td_img"></td>
                            <td><a href="./books/9.html"><img src="http://bimage.interpark.com/goods_image/3/1/1/1/268163111g.jpg" class="td_img"></td>
                        </tr>
                        <tr>
                            <td class="title">오직 두사람</td>
                            <td class="title">말의 품격</td>
                            <td class="title">82년생 김지영</td>
                            <td class="title">인간과 문화의 무지개다리</td>
                        </tr>
                    </tbody>
                </table>
            </center>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>