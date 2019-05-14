<?php
$s_id = $_GET['id'];

//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$conn = mysqli_connect("localhost", "root", "", "phplearning");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record

$sql = "DELETE FROM enrolled WHERE s_id=$s_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location:financialinfo.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
