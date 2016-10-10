<?php
$items = array();
$conn = new mysqli("localhost", "root", "", "vue");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name FROM categories";
$result = $conn->query($sql);
$items=array();
$i=0;
while($row = $result->fetch_assoc()) 
{
	$items[$i]["id"]=$row["id"];
	$items[$i]["name"]=$row["name"];
	$i++;
}
header('content-type: application/json; charset=utf-8');	
echo '{"categories":'.json_encode($items)."}";
$conn->close();
?>