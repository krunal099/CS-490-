<?php
/*
Dhawal Khatiwala
Backend-questionadd_back.php
*/
	include "db.php";

	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	 
	$id=$response['id'];
	if(isset($response['name'])) $name = $response['name'];
	if(isset($response['level'])) $level = $response['level'];
	if(isset($response['description'])) $description = $response['description'];
	if(isset($response['category'])) $category=$response['category'];
	if(isset($response['code'])) $code=$response['code'];

	$input=$response['input'];
	if(isset($response['output'])) $output=$response['output'];
	if($id==''){
		$sql="insert into `question` (`name`,`description`,`level`,`category`,`code`,`input`,`output`) VALUES ('$name','$description','$level','$category','$code','$input','$output')";
		$query = $db->query($sql);
		if($query) echo 'Question is added successfuly.';
		else echo "Question addtion is failed.";

	}
	else{
		$sql="update `question` set `name`='$name', `description`='$description', `level`='$level', `category`='$category', `code`='$code',`input`='$input',`output`='$output' where `id`='$id'";
		$query=$db->query($sql);
		if($query) echo "Question modification is done successfuly";
		else echo "Question modification is failed";
	}

?>
