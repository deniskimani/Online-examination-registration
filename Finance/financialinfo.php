<?php
session_start();

//make a connectio to Database
$conn=mysqli_connect('localhost', 'root', '');
//select database
mysqli_select_db($conn,'phplearning') or die(mysqli_error($conn));
$sql="SELECT s_id, regno, name, department, unit, year, type, pending_fee, extra_fee FROM enrolled, finance WHERE regno=student ORDER BY s_id";

$records=mysqli_query($conn, $sql);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{
        background:#DDC9C9;
        margin-left: 50px;
        margin-right: 50px;
        margin-top: 40px;

      }
      table {
  border-collapse: collapse;
  width: 100%;
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
  </head>
  <body>
    <h1>Specials Students</h1>
    <div style="overflow-x:auto;">
    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" padding="30px">
      <tr>
        <th>id</th>
        <th>Regno</th>
        <th>Name</th>
        <th>Department</th>
        <th>Unit</th>
        <th>Year</th>
        <th>Type</th>
        <th>Pending fee</th>
        <th>Extra fee</th>
        <th>Action</th>
      <tr>

    <?php
    while($student=mysqli_fetch_assoc($records)){
      echo "<tr>";
      echo "<td>".$student['s_id']."</td>";
      echo "<td>".$student['regno']."</td>";
      echo "<td>".$student['name']."</td>";
      echo "<td>".$student['department']."</td>";
      echo "<td>".$student['unit']."</td>";
      echo "<td>".$student['year']."</td>";
      echo "<td>".$student['type']."</td>";
      echo "<td>".$student['pending_fee']."</td>";
      echo "<td>".$student['extra_fee']."</td>";
      echo "<td><a href='delete.php?id=".$student['s_id']."'>Delete</a></td>";
      echo "</tr>";
    }
     ?>
    </table>
    <div class="btn btn-success" style="float:right">

    <form>
      <button class="btn">Print Table</button>
    </form>

    </div>
  </div>

  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>
  <script>
    $('.btn').click(function(){
      var printme = document.getElementById('zctb');
      var wme = window.open("","","width=900,height=700");
      wme.document.write(printme.outerHTML);
      wme.document.close();
      wme.focus();
      wme.print();
      wme.close();
    })
  </script>

  </body>
</html>
