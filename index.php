<?php
$pdo = new PDO('pgsql:host=localhost;dbname=messages', 'user', '');

$date = date('Y-m-d_h:i:s');


if (isset($_POST['message']) AND $_POST['message'] != "") {
  $query = "INSERT INTO messages (message, created) VALUES ('".$_POST['message']."' , '".$date."')";
  $pdo->query($query);
}

if (isset($_POST['command']) AND $_POST['command'] == 'clear') {
  $query = "TRUNCATE messages";
  $pdo->query($query);
}

$query = $pdo->query('SELECT * FROM messages');
$res = $query->fetchAll();



function cmp($a, $b)
{

    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
}
$mes = array();
foreach ($res as $key => $val) {
  $mes[$key]['id'] = $val['id'];
  $mes[$key]['message'] = $val['message'];
  $mes[$key]['created'] = $val['created'];
}
usort($mes, "cmp");

 ?>
 <!DOCTYPE HTML>
 <html>
  <head>
   <meta charset="utf-8">
   <title>385_1</title>
  </head>
  <body>

    <?php foreach ($mes as $key => $val):?>
    <p><b><?php print_r($val['message']."  ".$val['created']); ?><br></b></p>
    <?php endforeach;?>


  <form action="index.php" method="post">
   <p><Br>
   <input type="text" name="message" value=""></p>
   <p><input type="submit"></p>
  </form>


  <form action="index.php" method="post">
   <p><Br>
   <input type="hidden" name="command" value="clear"></p>
   <p><input type="submit" value="удалить все сообщения"></p>
  </form>
  </body>
 </html>
