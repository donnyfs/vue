<?php
$items = array();
$conn = new mysqli("localhost", "root", "", "vue");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name,category_id FROM sub_categories";
$result = $conn->query($sql);
$items=array();
$i=0;
while($row = $result->fetch_assoc()) 
{
	$items[$i]["id"]=$row["id"];
	$items[$i]["name"]=$row["name"];
	$items[$i]["category_id"]=$row["category_id"];
	$i++;
}
header('content-type: application/json; charset=utf-8');	
echo '{"subcategories":'.json_encode($items)."}";
$conn->close();
?>