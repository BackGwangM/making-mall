<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./login_style.css">
	</head>
	<body>
	<div id = "main">
	<form action="joinprocess.php" method="POST" name="join">
	<table border="0" summary="테이블 관련 요소 목록">
	
	<caption><h2>회원가입</h2></caption>
	<tbody>
		<tr>
			<td>아이디  </td>
			<td><input type="text" name="id" placeholder="아이디" maxlength="16" required /></td>
		</tr>
		<tr>
		<td><br></td>
		</tr>
		<tr>
			<td>비밀번호  </td>
			<td><input type="password" name="pw" placeholder="비밀번호" maxlength="20"required/></td>
		</tr>
		<tr>
		<td><br></td>
		</tr>
		<tr>
			<td>이름  </td>
			<td><input type="text" name="name" placeholder="이름" required/></td>
		</tr>
		<tr>
		<td><br></td>
		</tr>
		<tr>
			<td>e-mail  </td>
			<td><input type="email" name="email" placeholder="e-mail" require/></td>
		</tr>
		<tr>
			<td>주소  </td>
			<td><input type="text" name="adress" placeholder="주소" require/></td>
		</tr>
		</tbody>
</table>
<div id="button">
<input type="submit" name="회원가입" value="회원가입" class="btn btn-success"> <a href="http://localhost/homework_3/homework_4/index.php"> <input type="button" value="뒤로가기" class="btn btn-warning"/></a>
</div>
</form>
	</div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<p id="error">크롬, 오페라 환경에 최적화된 웹페이지입니다. 엣지, 익스플로러, 파이어폭스에서는 깨진 화면이 보일 수 있습니다.</p>
</body>
</html>