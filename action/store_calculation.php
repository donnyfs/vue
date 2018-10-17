<?php
$json = file_get_contents('php://input');
$jsond = json_decode($json);
$file = fopen("calculation.txt","w");
$isi="";
foreach($jsond->rows as $o)
{
	$q=$o->qty;
	$d=$o->description;
	$p=$o->price;
	$t=$o->tax;
	$isi.="$q;$d;$p;$t\r\n";
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