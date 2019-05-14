<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Supplimentary and Specials register">
    <meta name="author" content="Kimani D.">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <title>Finance dashbord</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Finance Department</a>

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="signout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="savedreports.php">
                  <span data-feather="file-text"></span>
                  Enrolled
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="financeadd.php">
                  <span data-feather="users"></span>
                  Add student financial information
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="financialinfo.php">
                  <span data-feather="bar-chart-2"></span>
                  Finacial Information
                </a>
              </li>

            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Settings</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <li class="nav-item">
              <a class="nav-link" href="../update.php">
                <span data-feather="settings"></span>
                Change password
              </a>
            </li>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>

          </div>
          <!--here-->
          <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
              <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-registered w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3><?php
                $server="localhost";
                $username="root";
                $pass="";
                $db="phplearning";
                $conn= mysqli_connect($server,$username,$pass,$db);

                $sql="SELECT count(id) AS total FROM users WHERE type='Student'";
                $result=mysqli_query($conn,$sql);
                $values=mysqli_fetch_assoc($result);
                $numrows=$values['total'];
                echo $numrows;
                   ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Student</h4>
              </div>
            </div>
            <div class="w3-quarter">
              <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-user-plus w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3><?php
                $server="localhost";
                $username="root";
                $pass="";
                $db="phplearning";
                $conn= mysqli_connect($server,$username,$pass,$db);

                $sql="SELECT count(s_id) AS total FROM enrolled";
                $result=mysqli_query($conn,$sql);
                $values=mysqli_fetch_assoc($result);
                $numrows=$values['total'];
                echo $numrows;
                   ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Enrolled</h4>
              </div>
            </div>
            <div class="w3-quarter">
              <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3><?php
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
                   ?></h3>
                </div>
                <div class="w3-clear"></div>

                <div class="w3-clear"></div>
                <h4>Users</h4>
              </div>
            </div>
          </div>
         <hr></br></br>
         <h5>Students</h5>
         <div>
         <?php

         //make a connectio to Database
         $conn=mysqli_connect('localhost', 'root', '');
         //select database
         mysqli_select_db($conn,'phplearning') or die(mysqli_error($conn));
         $sql="SELECT * FROM users WHERE type='Student'";

         $records=mysqli_query($conn, $sql);


         ?>
         <style>

         table {
         border-collapse: collapse;
         width: 75%;
         }

         th, td {
         text-align: left;
         padding: 8px;
         }

         tr:nth-child(even){background-color: #E5E4E4}

         th {
         background-color: #C95252;
         color: white;
         }

         </style>
         <div style="overflow-x:auto;">
         <table>
         <tr>
         <th>RegNo</th>
         <th>TimeStamp</th>
         <tr>

         <?php
         while($student=mysqli_fetch_assoc($records)){
         echo "<tr>";

         echo "<td>".$student['username']."</td>";
         echo "<td>".$student['created']."</td>";

         echo "</tr>";
         }
         ?>
         </table>
         </div>
         </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>


  </body>
</html>
