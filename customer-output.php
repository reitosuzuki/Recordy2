<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recordy 新規登録</title>
    <link rel="stylesheet" href="back.css">
  </head>
  <body>
    <div class="test">
<?php
$pdo=new PDO('mysql:host=localhost;dbname=recordy;charset=utf8',
	'staff', 'reito417');
if (isset($_SESSION['customer'])) {
	$id=$_SESSION['customer']['id'];
	$sql=$pdo->prepare('select * from customer where id!=? and login=?');
	$sql->execute([$id, $_REQUEST['login']]);
} else {
	$sql=$pdo->prepare('select * from customer where login=?');
	$sql->execute([$_REQUEST['login']]);
}
if (empty($sql->fetchAll())) {
	if (isset($_SESSION['customer'])) {
		$sql=$pdo->prepare('update customer set  '.
			'login=?, password=? where id=?');
		$sql->execute([
			$_REQUEST['login'], $_REQUEST['password'], $id]);
		$_SESSION['customer']=[
			'id'=>$id,  'login'=>$_REQUEST['login'],
			'password'=>$_REQUEST['password']];
		echo 'お客様情報を更新しました。';
	} else {
		$sql=$pdo->prepare('insert into customer values(null,?,?)');
		$sql->execute([
			$_REQUEST['login'], $_REQUEST['password']]);
		echo '新規登録しました。';
	}
} else {
	echo 'ログイン名が既に使用されていますので、変更してください。';
}
?>
</div>
<a href="login_form.html">ログイン画面へ</a>


</body>
</html>
