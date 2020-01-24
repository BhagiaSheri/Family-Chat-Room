
function saveMsg(){
		var msg=document.getElementById("msg");

        var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                //this.responseText;
                
                }
            };
        
        xhttp.open("GET", "showChat.php?msg="+msg.value, true);
        
        xhttp.send();
    msg.value="";
    
    }
    

function showMsg(){
		
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			document.getElementById("showMsg").innerHTML = this.responseText;
			
			}
        };
        
    
	
	//xhttp.open("GET", "chatting.php", true);
	
	xhttp.send();


}

//var a = setInterval(showMsg(),1000);


