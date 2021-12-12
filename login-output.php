<?php session_start();?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Recordy</title>
		<link rel="stylesheet" href="back.css">
	</head>
	<body>

<?php
unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=recordy;charset=utf8',
	'staff', 'reito417');
$sql=$pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql->fetchall() as $row) {
    $_SESSION['customer']=
	[
    'id'=>$row['id'],
		'login'=>$row['login'],
		'password'=>$row['password']];
}

if (isset($_SESSION['customer'])) {
  echo 'ようこそ、',$_SESSION['customer']['login'],'さん。';
} else {
     echo 'ログイン名またはパスワードが間違っています。';
     }
 ?>
 <a href="logout-output.php">ログアウト</a>

 <form class="" action="study-today.php" method="post">
　数学<input type="number" name="math">
  英語<input type="number" name="english">
	社会<input type="number" name="society">
	理科<input type="number" name="science">
	その他<input type="number" name="others">
	合計<input type="number" name="sam">

	<input type="text" name="to_do_1">
	<input type="text" name="to_do_2">
	<input type="text" name="to_do_3">
	
	<input type="submit"  value="追加">
 </form>




</body>
</html>
