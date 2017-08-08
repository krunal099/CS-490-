<?php include "conf.php";?>
<?php include "instructor_head.php";?>
<script src="question_bank.js" type="text/JavaScript"></script>
<link href="css/onlineexam.css" rel="stylesheet">
<center>
	<h2>Make New Questions or Modify Existing Questions</h2>
	<div>
		<label>Questions</label>
		<select id="question_list" name="question_list" width="50px" onchange="viewQuestion();">
			<option></option>
		</select>
	</div>
	<div>
		<div>
			<input type="hidden" name="qID" id="qID">
			<label>Qustion Name
			<input type="text" name="qName" id="qName" placeholder="Question Name"/>
			</label><br>
			<label>Question Description</label><br>
			<textarea name="qDescript" id="qDescript" placeholder="Question Description"></textarea><br>
			<label>Sample Code</label><br>
			<textarea name="qCode" id="qCode" placeholder="Sample Code"></textarea><br>
			<label>Sample output</label><br>
			<textarea name="qOutput" id="qOutput" placeholder="Sample Output"></textarea><br>
		</div><br>
		<div>
			<label>Category
				<select name="qCategory" id="qCategory">
					<option></option>
					<option value="for">For</option>
					<option value="while">While</option>
					<option value="method">Method</option>
				</select>
			</label><br>
			<label>Difficulty level
				<select name="qLevel" id="qLevel">
					<option></option>
					<option value="easy">Easy</option>
					<option value="medium">Medium</option>
					<option value="hard">Hard</option>
				</select>
			</label>
		</div>
	</div>
	<div>
		<h2>
			<input type="button" class="btn btn-lg btn-primary" value="New" onclick="newQuestion();"></input>
			<input type="button" class="btn btn-lg btn-success" value="Add" onclick="addQuestion();"></input>
		</h2>
	</div>
</center>
<div id="ajaxDiv"></div>
<?php include "foot.php"?>
