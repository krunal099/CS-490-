<?php
/*
Dhawal Khatiwala
Backend- assestInst_back.php
*/
	include "db.php";
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$sql="select * from exam where `status`='2'";
	$query=$db->query($sql);
	$res=$query->fetch();
	$exam=$res['id'];
	$sql="select * from answer where `examId`='$exam'";
	$query = $db->query($sql);
	$result=$query->fetchAll();
	$data=[];
	foreach($result as $r){
		$id=$r['id'];
		$st=$r['stdId'];
		$q=$r['quesId'];
		$code=$r['code'];
		$output=$r['output'];
		$ass=$r['assest'];
		$point=$r['point'];
		$feedback=$r['feedback'];
		
		$sql="select * from question where `id`='$q'";
		$query = $db->query($sql);
		$res=$query->fetch();
		$sample=$res['output'];
		
		$sql="select * from users where `id`='$st'";
		$query=$db->query($sql);
		$res=$query->fetch();
		$name=$res['username'];
		
		$data[]=array("id"=>$id,
					"name"=>$name,
					"stdId"=>$st,
					"quesId"=>$q,
					"code"=>$code,
					"output"=>$output,
					"sample"=>$sample,
					"point"=>$point,
					"assest"=>$ass,
					"feedback"=>$feedback);
	}
	echo json_encode($data);
?>
