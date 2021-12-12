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
  foreach ($pdo->query('select to_do_1,to_do_2,to_do_3 from to_do where customer_id=$customer_id and max(created_at) ') as $todo) {
    echo "$todo";
  }
  }
 ?>

 }





  </body>
</html>
