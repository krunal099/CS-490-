<?php
/*
Dhawal Khatiwala
Backend-studentExampage_back.php
*/
	include "db.php";
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$studentId=$response['studentId'];
	$sql="select * from exam where `status` = '2'";//selected exam by instructor
	$query = $db->query($sql);
	$result=$query->fetch();
	$exam=$result['id'];
	
	$sql="update `users` set `current_exam`='$exam' where `id` = '$studentId'";//selected exam by instructor
	$query = $db->query($sql);
	
	$q_string=$result['questions'];
	$temp=[];
	$points=[];
	$temp=split(" ",$q_string);
	$points=split(" ",$result['points']);
	$i=0;
	$data=[];
	foreach($temp as $t){
		$point=$points[$i];
		$sql="select * from question where `id` = '$t'";
		$query = $db->query($sql);
		$result=$query->fetch();
		$data[]=array('id'=>$result['id'],'name'=>$result['name'],'description'=>$result['description'],'level'=>$result['level']);
		$id=$result['id'];
		$sql="select * from answer where `stdId`='$studentId' and `examId`='$exam' and `quesId`='$id'";
		$query=$db->query($sql);
		$res=$query->fetch();
		if($res['stdId']==''){
			$sql="insert into `answer` (`examId`,`stdId`,`quesId`,`point`,`assest`) values('$exam','$studentId','$id','$point','0')";//selected exam by instructor
			$query = $db->query($sql);
		}
	}
	echo json_encode($data);
?>