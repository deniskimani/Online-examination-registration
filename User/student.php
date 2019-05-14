<?php
include "departmentdropdown.php";
include "unitdropdown.php";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>register</title>
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

<h2 style="text-align:center">Register Exam</h2>

<form action="" method="POST">

  </div>

  <div class="container">

    <input type="text" placeholder="Enter regno" id= "regno" name="regno" required></br></br>

    <input type="text" placeholder="Enter name" name="name" id= "name" required></br></br>


    <select  name="department">


            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select></br></br>

        <select name="unit">


            <?php while($row2 = mysqli_fetch_array($result2)):;?>

            <option><?php echo $row2[1];?></option>

            <?php endwhile;?>

        </select></br></br>

    <input type="text" placeholder="Enter year" name="year" id= "year" required></br></br>

    <select name="type" id="type">
         <option value="-1">Exam type</option>
         <option value="SPECIAL">Special</option>
         <option value="SUPP">SUPP</option>
         </select></br></br>



    <input type="submit" name="submit" value="SUBMIT">


  <div class="container" style="background-color:#f1f1f1">


  </div>
</form>
<?php
session_start();


if (isset($_POST['submit'])) {
//create connection
$conn=mysqli_connect('localhost', 'root', '');
//select Database
mysqli_select_db($conn,'phplearning') or die(mysqli_error($conn));
// check connection
if (!$conn){
  die("Connection failed:" . mysqli_connect_error());
}
$sql="INSERT INTO enrolled (regno, name, department, unit, year, type) VALUES ('$_POST[regno]', '$_POST[name]', '$_POST[department]','$_POST[unit]', '$_POST[year]', '$_POST[type]')";
if($conn->query($sql)==TRUE){
  echo "<div style=\"text-align:center\">";

  echo "Registered Successfully";

  echo "</div>";
  header("refresh:2 url=student.php");
}
}

 ?>
</body>
</html>
