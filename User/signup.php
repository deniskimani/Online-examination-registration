<?php

// get database connection
include_once 'database.php';
// instantiate user object
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// set user property values
$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->created = date('Y-m-d H:i:s');
$user->type =$_POST['type'];
// create the user
if($user->signup()){
    echo "<script type='text/javascript'>alert('Successfully signed up!');</script>";
      header("refresh:1 url=../../index.php");

}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Username already exists!"

    );
    header("refresh:1 url=../oers/index.php");
}
?>
