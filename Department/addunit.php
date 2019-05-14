<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>add units</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;
  background: #e5e3e3;
  padding-left:250px;
  padding-right: 250px;
}
form {border: 3px solid #f1f1f1;
padding: 60px;
padding-left: 250px;

}
select{
  border: 1px solid #ccc;
  padding: 8px;
}

input[type=text]{
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=submit]{
  background-color: #9E1F1F;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 70%;
}


</style>
</head>
<body>

<h2 style="text-align:center">Add Units</h2>

<form  method="POST">

  </div>

  <div class="container">

    <input type="text" placeholder="Enter Unitcode and Unit name" name="unitname" id= "unitname" required></br></br>

    <input type="text" placeholder="Enter Year" name="year" id= "year" required></br></br>

    <input type="text" placeholder="Enter Department" name="department" id= "department" required></br></br>



    <input type="submit" name="submit" value="SUBMIT">


  <div class="container" style="background-color:#f1f1f1">


  </div>
</form>
<?php
if (isset($_POST['submit'])) {
//create connection
$conn=mysqli_connect('localhost', 'root', '');
//select Database
mysqli_select_db($conn,'phplearning') or die(mysqli_error($conn));
// check connection
if (!$conn){
  die("Connection failed:" . mysqli_connect_error());
}
$sql="INSERT INTO units ( unitname, year, department) VALUES ( '$_POST[unitname]', '$_POST[year]', '$_POST[department]')";
if($conn->query($sql)==TRUE){
  echo "<div style=\"text-align:center\">";

  echo "New unit created";

  echo "</div>";
  header("refresh:1 url=addunit.php");
}
}

 ?>
</body>
</html>
