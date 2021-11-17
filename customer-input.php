<?php session_start(); ?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recordy 新規登録</title>
    <link rel="stylesheet" href="login-form.css">
  </head>
  <body>
<?php
$login=$password='';
if (isset($_SESSION['customer'])) {
  $login=$_SESSION['customer']['login'];
  $password=$_SESSION['customer']['password'];
}
?>

<div class="form-wrapper">
  <h1>新規登録</h1>
  <form action="customer-output.php" method="post">
    <div class="form-item">
      <label for="ログイン名"></label>
      <input type="login" name="login" required="required" placeholder="ご希望のログイン名" </input>
    </div>
    <div class="form-item">
      <label for="パスワード"></label>
      <input type="password" name="password" required="required" placeholder="パスワード"</input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" title="登録" value="登録"></input>
    </div>
  </form>
  <div class="form-footer">
    <p></p>
  </div>
</div>

</body>
</html>
