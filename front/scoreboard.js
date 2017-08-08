try{
	// Opera 8.0+, Firefox, Safari
	ajaxRequest = new XMLHttpRequest();
} catch (e){
	// Internet Explorer Browsers
	try{
		ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try{
			ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e){
			// Something went wrong
			alert("Your browser broke!");
		}
	}
}
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var ajaxDisplay = document.getElementById('ajaxDiv');
		var res=ajaxRequest.responseText;
		var data=JSON.parse(res);
	//	alert(res);
		var html="<div class='container row'>";
		html+="<div class='col-mod-12'>";
		html+="<table class='table table-striped'>";
		html+="<thead><tr>";
		html+="<th>Student</th>";
		html+="<th>Question</th>"
		html+="<th>Answer</th>";
		html+="<th>Assest</th>";
		html+="</tr></thead>";
		var len=data.length;
		L=len;
		html+="<tbody>"
		for(var i=0;i<len;i++){
			html+='<tr><td>'+data[i]['stdId']+'</td>';
			html+='<td>'+data[i]['quesId']+'</td>';
			html+='<td>'+data[i]['answer']+'</td>';
			html+='<td>'+data[i]['assest']+'</td>';
			html+='</tr>';
		}
		html+="</tbody></table>";
		html+="</div></div>";
		ajaxDisplay.innerHTML=html;
	}
}
ajaxRequest.open("POST", MID_PATH+"scoreboard_middle.php", true);
ajaxRequest.send(null);

