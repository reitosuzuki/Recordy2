<?php session_start(); ?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>ログアウト</title>
		<link rel="stylesheet" href="back.css">
	</head>
	<body>
				<?php
				if (isset($_SESSION['customer'])) {
					unset($_SESSION['customer']);
					echo 'ログアウトしました。';
				} else {
					echo '既にログアウトしています。';
				}
				?>
				
				<a href="index.html">ホームへ</a>


</body>
</html>
