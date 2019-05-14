<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
  $server="localhost";
  $username="root";
  $pass="";
  $db="phplearning";
  $conn= mysqli_connect($server,$username,$pass,$db);

  $sql="SELECT count(id) AS total FROM users";
  $result=mysqli_query($conn,$sql);
  $values=mysqli_fetch_assoc($result);
  $numrows=$values['total'];
  echo $numrows;
     ?>

  </body>
</html>
