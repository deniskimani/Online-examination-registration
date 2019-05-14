<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "phplearning");
if (isset($_POST["submit"]))
{
  $username=$_POST["username"];
  $password1=$_POST["password"];
  $password2=$_POST["password1"];

  if (empty ($username)) {
    echo "please input your username";
  }
  elseif (empty ($password1)) {
    echo "please input your old password";
  }
  else {
    $query="SELECT * FROM users WHERE username = '".$username."' AND password = '".$password1."'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
   $sql="UPDATE users SET password='$password2' WHERE username = '$username'";
   if (mysqli_query($conn,$sql)) {
     echo "success";
   }
    }
  }}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>change password</title>
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

<h2 style="text-align:center">Change password</h2>

<form  method="POST">

  </div>

  <div class="container">

    <input type="text" placeholder="Username" id= "username" name="username" required></br></br>


    <input type="text" placeholder="Old password" name="password" id= "password" required></br></br>

    <input type="text" placeholder="New password" name="password1" id= "password1" required></br></br>

    <input type="submit" name="submit" value="SUBMIT">


  <div class="container" style="background-color:#f1f1f1">


  </div>
</form>
