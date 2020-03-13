<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'clientmgtsystem');


$absolute_path = realpath("fetchdata.php");

print "Absolute path is: " . $absolute_path;

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$sql1 ="SELECT * FROM clients";

//execute query
$result1 = $mysqli->query($sql1);
$sql2 ="SELECT * FROM projects";

//execute query
$result2 = $mysqli->query($sql2);

$r1 = mysqli_num_rows($result1);
$r2 = mysqli_num_rows($result2);


$data = [
  $r1,$r2
];







//loop through the returned data
// $data = array();
// foreach ($result as $row) {
//   $data[] = $row;
// }

//free memory associated with result
$result1->close();
$result2->close();


//close connection
$mysqli->close();

//now print the data
print json_encode($data);