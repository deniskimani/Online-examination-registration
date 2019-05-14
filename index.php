<?php

   session_start();
   $conn= mysqli_connect("localhost","root", "");

   mysqli_select_db($conn,'phplearning') or die(mysqli_error($conn));

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      $user_type = mysqli_real_escape_string($conn,$_POST['type']);

      $sql = "SELECT * FROM users WHERE username = '$myusername' AND password = '$mypassword' AND type = '$user_type' ";

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if (($count == 1) && $user_type == 'Student')  {
         $_SESSION['user'] = $myusername;
         // This line can change based on where you want student to go
         header("Location: ../oers/api/User/index.php");

     }
      elseif (($count == 1) && $user_type == 'Admin') {
         $_SESSION['user'] = $myusername;
         // This line can change based on where you want TA to go
         header("Location: ../oers/api/Admin/admin.php");
      }
      elseif (($count == 1) && $user_type == 'Department') {
         $_SESSION['user'] = $myusername;
         // This line can change based on where you want student to go
         header("Location: ../oers/api/Department/department.php");
      }
      elseif (($count == 1) && $user_type == 'Finance') {
         $_SESSION['user'] = $myusername;
         // This line can change based on where you want student to go
         header("Location: ../oers/api/Finance/finance.php");
      }
      else {
         $error = "Incorrect log in details, please try again";
      }
   }

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>login</title>


  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet" href="./assets/css/style.css">
  <style media="screen">
  body{
margin:90px;
color:#6a6f8c;
background: #384670;
font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}
.login-wrap{
width:100%;
margin:auto;
margin-top: 30px;
max-width:525px;
min-height:600px;
position:relative;
background:url(http://codinginfinite.com/demo/images/bg.jpg) no-repeat center;
box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
width:100%;
height:100%;
position:absolute;
padding:90px 70px 50px 70px;
background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
top:0;
left:0;
right:0;
bottom:0;
position:absolute;
-webkit-transform:rotateY(180deg);
        transform:rotateY(180deg);
-webkit-backface-visibility:hidden;
        backface-visibility:hidden;
transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
text-transform:uppercase;
}
.login-html .tab{
font-size:22px;
margin-right:15px;
padding-bottom:5px;
margin:0 15px 10px 0;
display:inline-block;
border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
color:#fff;
border-color:#1161ee;
}
.login-form{
min-height:345px;
position:relative;
-webkit-perspective:1000px;
        perspective:1000px;
-webkit-transform-style:preserve-3d;
        transform-style:preserve-3d;
}
.login-form .group{
margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
width:100%;
color:#fff;
display:block;
}
.login-form .group .input,
.login-form .group .button{
border:none;
padding:15px 20px;
border-radius:25px;
background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
text-security:circle;
-webkit-text-security:circle;
}
.login-form .group .label{
color:#aaa;
font-size:12px;
}
.login-form .group .button{
background:#1161ee;
}
.login-form .group label .icon{
width:15px;
height:15px;
border-radius:2px;
position:relative;
display:inline-block;
background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
content:'';
width:10px;
height:2px;
background:#fff;
position:absolute;
transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
left:3px;
width:5px;
bottom:6px;
-webkit-transform:scale(0) rotate(0);
        transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
top:6px;
right:0;
-webkit-transform:scale(0) rotate(0);
        transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
color:#fff;
}
.login-form .group .check:checked + label .icon{
background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
-webkit-transform:scale(1) rotate(45deg);
        transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
-webkit-transform:scale(1) rotate(-45deg);
        transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
-webkit-transform:rotate(0);
        transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
-webkit-transform:rotate(0);
        transform:rotate(0);
}
.hr{
height:2px;
margin:60px 0 50px 0;
background:rgba(255,255,255,.2);
}
.foot-lnk{
text-align:center;
}
select{
  border: 1px solid #ccc;
  padding: 8px;
  border-radius: 17px;
  background-color: #e5edfc;


}
  </style>
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <form class="sign-in-htm"  method="POST">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>

        </div>
        <div class="group">
          <table>
            <tr>
              <td>USER TYPE</td>
              <td><select name="type">
                   <option value="-1">select user type</option>
                   <option value="Admin">Admin</option>
                   <option value="Finance">Finance</option>
                   <option value="Department">Department</option>
                   <option value="Student">Student</option>
                   </select>
             </td>
            </tr>
          </table>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
      </form>
      <form class="sign-up-htm" action="../oers/api/User/signup.php"  method="POST">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <table>
            <tr>
              <td>USER TYPE</td>
              <td><select name="type">
                   <option value="-1">select user type</option>
                   <option value="Student">Student</option>
                   </select>
             </td>
            </tr>
          </table>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>
