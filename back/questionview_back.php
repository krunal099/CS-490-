<?php
/*
Dhawal Khatiwala
Backend-question_back.php
*/
	include "db.php";
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$id="";
	if(isset($response['id'])) $id = $response['id'];
	$sql="select * from question where `id` = '$id'";
	$query = $db->query($sql);
	$result=$query->fetchAll();
	$data=[];
	foreach ($result as $row){
		$data[]=array('id'=>$row['id'],
					  'name'=> $row['name'],
					  'description'=>$row['description'],
					  'category'=>$row['category'],
					  'code'=>$row['code'],
					  'input'=>$row['input'],
					  'output'=>$row['output'],
					  'level'=>$row['level']);
	}
	echo json_encode($data);
?>

 