var L;
var NAME=[];
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
		var html="<div class='row'>";
		html+="<div class='col-md-12'>";
		html+="<table class='table table-striped' style='margin:2px;'>";
		html+="<thead  style='background-color:#42ABCA;'><tr><td>Student</td>";
		html+="<td>Problem</td>";
		html+="<td>Code</td>";
		html+="<td>Output</td>";
		html+="<td>Sample<br>Output</td>";
		html+="<td>Problem<br>Weight</td>";
		html+="<td>Assest</td>";
		html+="</thead></tr>";
		html+="<tbody>";
		var len=data.length;
		L=len;
		for(var i=0;i<len;i++){
			NAME.push(data[i]['id']);
			html+='<tr><td>'+data[i]['stdId']+'</td>';
			html+='<td>'+data[i]['quesId']+'</td>';
			html+='<td><textarea disabled>'+data[i]['code']+'</textarea></td>';
			html+='<td>'+data[i]['output']+'</td>';
			html+='<td>'+data[i]['sample']+'</td>';
			html+='<td>'+data[i]['point']+'</td>';
			html+='<td><input type="text" value="'+data[i]['assest']+'"'+'id="'+data[i]['id']+'" placeholder="score" style="border:none;">'+'</input></td>';
			html+='</tr>';
		}
		html+="</tbody></table>";
		html+='</div></div>';
		ajaxDisplay.innerHTML=html;
	}
}
ajaxRequest.open("POST", MID_PATH+"assestInst_middle.php", true);
ajaxRequest.send(null);

function release(){
	var ajaxRequest;  // The variable that makes Ajax possible!
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
			alert(res);
		}
	}
	var assest=[];
	for(var i=0;i<L;i++){
		var id=NAME[i];
		var ass=document.getElementById(id).value;
		var a={'id':id,'assest':ass};
		assest.push(a);
	}
	ajaxRequest.open("POST", MID_PATH+"release_middle.php", true);
	ajaxRequest.send(JSON.stringify(assest));
}
