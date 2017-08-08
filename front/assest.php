<?php include "conf.php"?>
<?php include "instructor_head.php";?>
<script src="assest_inst.js"></script>
<style>
	textarea{
		width:300px;
		border:none;
	}
</style>
<center><h3>Assest Exam</h3></center>
<div align="right">
	<input type="button" value="Release" class="btn btn-info" onclick="release();"/>
	<input type="button" value="End Exam" class="btn btn-danger" onclick="endexam();"/>	
</div>
<div id="ajaxDiv"></div>

<?php include "foot.php";?>