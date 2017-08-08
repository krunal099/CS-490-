var LN;
var DATA=[];
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
	// Create a function that will receive data sent from the server
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var ajaxDisplay = document.getElementById('ajaxDiv');
		var res=ajaxRequest.responseText;
	//	alert(res);
		var data=JSON.parse(res);
		var html='<div class="container">';
		var len=data.length;
		LN=len;
		for(var i=0;i<len;i++){
			DATA.push(data[i]['id']);
			html+='<div><p><em>Problem'+(i+1)+':</em>';
			html+=data[i]['name']+'</p>';
			html+='<label>Question Description:</label><br>';
			html+='<p>'+data[i]['description']+'</p>';
			html+='<label>Your answer</label><br>';
			html+='<textarea style="width:80%" id="'+data[i]['id']+'"></textarea><br><br>';
			html+='</div>';
		}
		html+='</div>';
		ajaxDisplay.innerHTML=html;
	}
}
ajaxRequest.open("POST", MID_PATH+"studentExampage_middle.php", true);
ajaxRequest.send(null);
function assest(){
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
		// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv');
			var res=ajaxRequest.responseText;
			alert(res);
		//	alert(res);
		/*	var data=JSON.parse(res);
			var html='<div><h3>Good Luck</h3></div>';
			var len=data.length;
			for(var i=0;i<len;i++){
				html+='<div><label><em>Problem'+(i+1)+':</em></label><br>';
				html+='<p>Qestion Name:'+data[i]['name']+'</p>';
				html+='<label>Question Description:</label><br>';
				html+='<p>'+data[i]['description']+'</p><br>';
				html+='<label>Your answer</label><br>';
				html+='<textarea id="'+data[i]['id']+'"></textarea><br><br>';
				html+='</div>';
			}*/
		//	ajaxDisplay.innerHTML=res;
		}
	}
	answers=[];
	for(var i=0;i<LN;i++){
		var ans=document.getElementById(DATA[i]).value;
		var ans={"id":DATA[i],"ans":ans};
		answers.push(ans);
	}
	ajaxRequest.open("POST", MID_PATH+"assest_middle.php", true);
	ajaxRequest.send(JSON.stringify(answers));
}
