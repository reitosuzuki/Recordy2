<?php session_start();?>

<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recordy</title>
  </head>
  <body>

<?php

if (isset($_SESSION['customer']['id'])) {
  $pdo=new PDO('mysql:host=localhost;dbname=recordy;charset=utf8',
    'staff', 'reito417');
  $customer_id=$_SESSION['customer']['id'];
  $sql=$pdo->prepare('select to_do_1,to_do_2,to_do_3 from to_do where customer_id=? ORDER BY created_at DESC LIMIT 1');
  $sql->execute([$customer_id]);
  //$result = $sql->fetchAll(PDO::FETCH_ASSOC);
  $result = $sql->fetch(PDO::FETCH_ASSOC);
  }
  ?>


<ul>
  <li><?php echo $result["to_do_1"]; ?></li>
  <li><?php echo $result["to_do_2"]; ?></li>
  <li><?php echo $result["to_do_3"]; ?></li>
</ul>

  <form class="" action="todo-delete.php" method="post">
   <input type="submit" name="" value="削除">
  </form>



  </body>
</html>
