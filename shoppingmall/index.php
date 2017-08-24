<?php
    session_start();
        
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "shop");

    if(isset($_SESSION["id"]) && isset($_SESSION["pw"]))
    {
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
    <link rel="stylesheet" type="text/css" href="main.css">
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
                    echo '<a href="login/logout.php"><input type="button" class="btn btn-warning" value="로그아웃"></a> ';
                    echo '<a href="cart/cart.php"><input type="button" class="btn btn-Info" value="장바구니"></a> ';
                    if($_SESSION["id"] == "admin")
                    {
                        echo '<a href="admin/admin_page.php"><input type="button" class="btn btn-success" value="운영자 페이지"></a>';
                    }
                }
                else{
                    echo '<a href="./login/login.php"><input type="button" value="로그인" class="btn btn-success"></a> <a href="./join/join.php"><input type="button" value="회원가입"  class = "btn btn-info"></a>';
                }
                
                ?>
            </div>
            <hr>
        </div>
            <center>
               <table>
                   <tbody>
                       <?php
                       $sql = "SELECT * FROM book_data;";
                       $result = mysqli_query($conn, $sql);
                       while($row = mysqli_fetch_assoc($result)) { 
                            echo '<tr><td style="padding-right: 50px;"><a href="./books/'.$row["no"].'.html"><img src='.$row["image_src"].' class="td_img"></a></td><td style=" padding-left: 100px; padding-right: 200px;"><br><h3>'.$row["name"].'</h3> 작가 | '.$row["author"].'<br> 출판사 | '.$row["publishing"].'<br> 작가 | '.$row["author"].'<br> 출판일자 | '.$row["date_of_publication"].'<br><br><h4>'.$row["price"].' 원</h4> </td></tr><tr><td colspan="2"><hr style="color: gray"></td></tr>';
                       }
                       ?>
                   </tbody>
               </table>
            </center>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </body>
</html>