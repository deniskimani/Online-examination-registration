<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '', 'phplearning');

 if($_SERVER["REQUEST_METHOD"] == "GET") {

   $regno=$_GET['regno'];

   $sql="SELECT * FROM enrolled WHERE regno='$regno'";

   $records=mysqli_query($conn, $sql);

}
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
    <form method="GET">

      <input type="text" name="regno" placeholder="Enter Regno">
      <input type="submit">
    </form>
    <div style="overflow-x:auto;">
      <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="70%" padding="30px">
        <tr>
          <th>Name</th>
          <th>Departmentt</th>
          <th>Unit</th>
          <th>Type</th>
        <tr>

      <?php
      while($student=mysqli_fetch_assoc($records)){
        echo "<tr>";

        echo "<td>".$student['regno']."</td>";
        echo "<td>".$student['department']."</td>";
        echo "<td>".$student['unit']."</td>";
        echo "<td>".$student['type']."</td>";

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
