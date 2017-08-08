<?php include "conf.php";?>
<?php
/*
==============
Krunal Patel
Middle: questionview_middle.php
=============
*/
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$id="";
	if(isset($response['id'])) $id = $response['id'];
	$res_proejct=question_project($id);	
	echo $res_proejct;

function question_project($id){
	$data = array('id' => $id);
	$url = $GLOBALS['BACK_PATH']."questionview_back.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	$response = curl_exec($ch);
	curl_close ($ch);
	return $response;
}
?>