<?php
/*
Dhawal Khatiwala
Backend- question_back.php
*/
	include "db.php";
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$sql="select * from question";
	$query = $db->query($sql);
	$result=$query->fetchAll();

	$data=[];
	foreach ($result as $row){
		$data[]=array('id'=>$row['id'],
					  'name'=> $row['name'],
					  'description'=>$row['description'],
					  'level'=>$row['level'],
					  'category'=>$row['category'],
					  'code'=>$row['code'],
					  'output'=>$row['output']);
	}
	
	echo json_encode($data);
?>

 