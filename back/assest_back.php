<?php
/*
Dhawal Khatiwala
Backend- assest_back.php
*/
include "db.php";
$str_json = file_get_contents('php://input'); 
$response = json_decode($str_json, true); // decoding received JSON to array

foreach($response as $r){
$studentId=$r['studentId']; $ans=$r['answer'];
$qid=$r['id'];	//write input file
$sql="select * from question where `id`='$qid'";
$query=$db->query($sql); $res=$query->fetch();
$input=$res['input'];
$file=fopen("in.txt","w"); fwrite($file,$input);	fclose($file);

$file=fopen("Main.java","w");
fwrite($file,$ans);
fclose($file);

shell_exec("sh run.sh");

$file=fopen("ans.txt","r");
$output=fread($file,filesize("ans.txt"));
fclose($file);

$sql="update `answer` set `code`='$ans', `output`='$output' where `stdId`='$studentId' and `quesId`='$qid'";

$query = $db->query($sql);
if($query) echo "submit success";
else echo "fail";
}
?>