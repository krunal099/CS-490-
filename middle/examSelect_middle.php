<?php include "conf.php";?>
<?php
/*
==============
Krunal Patel
Middle: examSelect_middle.php
=============
*/
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	if(isset($response['id'])) $id = $response['id'];
	if(isset($response['name'])) $name = $response['name'];
	if(isset($response['questions'])) $questions = $response['questions'];
	$res_proejct=question_project($id,$name,$questions);	
	echo $res_proejct;

function question_project($id,$name,$questions){
	
	$data = array('id'=>$id,'name'=>$name,'questions' => $questions);
	$url = $GLOBALS['BACK_PATH']."examSelect_back.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	$response = curl_exec($ch);
	curl_close ($ch);
	return $response;
}

?>