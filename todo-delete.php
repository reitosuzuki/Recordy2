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
    $customer_id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('update to_do set to_do_1="" WHERE customer_id=? ORDER BY created_at DESC LIMIT 1');
    $sql->execute([$customer_id]);

    header('Location: http://localhost/Recordy/study-result.php');
    exit();
     ?>
  </body>
</html>
