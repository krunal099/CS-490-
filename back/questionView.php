<?php
/*
Dhawal Khatiwala
Backend-questionView.php
*/
	include "db.php";

	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	 
	$level="none";
	if(isset($response['level'])) $level = $response['level'];
	
	$sql="select * from question where `level` = '$level'";
	$query = $db->query($sql);
	$result=$query->fetchAll();
	$data=[];
	foreach ($result as $row){
		$data[]=array('name'=> $row['name'],'level'=>$row['level']);
	}
	echo json_encode($data);
?>

 