<?php
include("connection.php");
if (isset($_GET['q'])) {
    $q = $_GET['q'];

// $query = mysqli_query($con, "SELECT * FROM request WHERE id=$q");
$result = mysqli_query($con, "SELECT * FROM request WHERE id=$q");

$row = mysqli_fetch_assoc($result);
  // echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";

unlink("./images/".$row["myfile"]);



$sql = "DELETE FROM request WHERE id = $q";

if (mysqli_query($con, $sql)) {
  $data = array('foo'=>'Record deleted successfully');


} else {
  $data = array('foo'=>"Error deleting record: " . mysqli_error($con));


}

mysqli_close($con);
return    json_encode($data);

}

 ?>
