<?php session_start() ?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


<?php
$pdo=new PDO('mysql:host=localhost;dbname=recordy;charset=utf8',
  'staff', 'reito417');

if (isset($_REQUEST['studytoday']['id'])) {
  foreach ($pdo->query('select * from studytoday') as $row) {

  }
} else {
  $sum=(int)$_REQUEST['math']+(int)$_REQUEST['english']+(int)$_REQUEST['society']+(int)$_REQUEST['science']+(int)$_REQUEST['others'];
  $sql=$pdo->prepare('insert into studytoday (customer_id , math , english , society , science , others,  sum) values(?,?,?,?,?,?,?)');
  $sql->execute([$_SESSION['customer']['id'],$_REQUEST['math'], $_REQUEST['english'], $_REQUEST['society'], $_REQUEST['science'], $_REQUEST['others'], $sum]);
}
  ?>

  </body>
</html>
