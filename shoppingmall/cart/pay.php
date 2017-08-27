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
    $arr = $_SESSION['cart'];
    $total = 0;
?>
<html>
    <head>
    <meta charset="utf8">
    <title>결제 진행 중... <?php echo $_POST['total']?>원</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="../popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" charset="utf-8" src="../jquery.leanModal.min.js"></script>
    <body>
        <div id="head">
            <center><a href="../index.php"><img src="../1.png" alt="<h1>월로서점</h1>" width="200px"></a>
        <h2>결제 진행</h2><br>
        </div>
         <form action="pay_process.php" method="POST">
                <center>
                <table style = "margin-top:20px;">
                <tr>
                    <td class="table" style="width : 50px;">No</td>
                    <td colspan="2" class="table" style="width : 600px;">책 제목</td>
                    <td class="table" style="width : 100px;">글쓴이</td>
                    <td class="table" style="width : 100px;">가격</td>
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
                    <td style="text-align: center;" ><img src="'.$row["image_src"].'" height="100px">.</td>
                    <td style="text-align: center;" >'.$row["name"].'</td>
                    <td style="text-align: center;  padding-left: 50px;">'.$row["author"].'</td>
                    <td style="text-align: right;" >'.$row["price"].' 원</td>
                    </tr>
                    <tr>
                    <td colspan="5"><hr style="color: gray"></td>
                    <tr>
                    ';
                }
                ?>
                <tr>
                    <td colspan="4" style="text-align: center;" ><h5>total</h5></td>
                    <td style="text-align: right;"><?php echo $total;?> 원</td>
                </tr>
            </table>
            <br>
            <?php 
            $sql = "SELECT * FROM member_data WHERE id = '".$_SESSION['id']."';"; 
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <table>
                <tr>
                    <td style="padding-right: 200px;">수령인</td>
                    <td style="padding-bottom: 25px; padding-top: 25px;"><input type="text" value="<?php echo $row['name']?>" name="name" id = "name" require/></td>
                    <tr>
                    <td>배송지</td>
                    <td style="padding-bottom: 25px; padding-top: 25px;"><input type="text" value="<?php echo $row['adress']?>" name="adress" id = "adress" size="50" require/></td>
                    </tr>
                    <tr></tr>
                    <td>이메일</td>
                    <td style="padding-bottom: 25px; padding-top: 25px;"><input type="text" value="<?php echo $row['e-mail']?>" name="e-mail" id="e-mail" size="50" require/></td>
                </tr>
            </table>
            <input type="hidden" value="<?php echo $_POST['total']?>" name="total">
            <a href="#loginmodal" id="modaltrigger"><input type="button" value="결제"class="btn btn-success"></a>
                </center>
            
            </div>

           
</form>
<form action="../index.php" method="POST">
<div id="loginmodal" style="display:none;">
	<h2>결제 확인</h2>
	<div class="p_c_text">아래 사항대로 결제가 진행됩니다. 맞으시면 결제 버튼을 눌러주세요.</div>
	<div class="login_line">
		<div class="box_in">
			<center>
				<table style="margin-top:20px;">
					<tr>
						<td class="table" style="width : 60px;">No</td>
						<td class="table" style="width : 100px;">책 제목</td>
						<td class="table" style="width : 55px;">글쓴이</td>
						<td class="table" style="width : 55px;">가격</td>
					</tr>
					<?php
                for($i = 0; $i < sizeof($arr); ++$i)
                {
                    $sql = "SELECT * FROM book_data WHERE no = '".$arr[$i]."';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<tr>
                    <td style="text-align: center;" >'.($i+1).'</td>
                    <td style="text-align: center;" >'.$row["name"].'</td>
                    <td style="text-align: center;  padding-left: 25px;">'.$row["author"].'</td>
                    <td style="text-align: right;" >'.$row["price"].' 원</td>
                    </tr>
                    <tr>
                    <td colspan="4"><hr style="color: gray"></td>
                    <tr>
                    ';
                }
                ?>
						<tr>
							<td colspan="3" style="text-align: center;">
								<h5>total</h5>
							</td>
							<td style="text-align: right;">
								<?php echo $total;?> 원</td>
						</tr>
		</div>

	</div>
	<div class="find_join">
		<table>
			<td style="padding-right: 100px;">수령인</td>
			<td style="padding-bottom: 10px; padding-top: 25px;">
				<script>
					var val = $('#name').val();
					document.write(val);
				</script>
			</td>
			<tr>
				<td>배송지</td>
				<td style="padding-bottom: 10px; padding-top: 25px;">
					<script>
						var val = $('#adress').val();
						document.write(val);
					</script>
				</td>
			</tr>
			<tr></tr>
			<td>이메일</td>
			<td style="padding-bottom: 10px; padding-top: 25px;">
				<script>
					var val = $('#e-mail').val();
					document.write(val);
				</script>
			</td>
		</table>
		<input type="submit" vaule="결제 확인" class="btn btn-success">
	</div>
</div>
</form>

<!--모달윈도우부분-->
<script type="text/javascript">
$(function(){
  $('#modaltrigger').leanModal({ top: 50, overlay: 0.8, closeButton: ".hidemodal" });
});
</script>
<!--//모달윈도우부분-->

</html>