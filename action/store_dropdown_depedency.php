<?php
$json = file_get_contents('php://input');
$jsond = json_decode($json);
$file = fopen("dropdown_depedency.txt","w");
$isi="";
foreach($jsond->rows as $o)
{
	$c=$o->selectedCategory;
	$sc=$o->selectedSubCategory;
	$isi.="$c, $sc\r\n";
}
$isi.="SENDER\r\n";
foreach($jsond->sender as $o)
{
	$isi.=$o->nama."\r\n";
}
fwrite($file,$isi);
fclose($file);
header('Content-type: application/json');
$isi=array('message'=>'success','status_code'=>200);
echo json_encode($isi);
?>