<!DOCTYPE html>
<html>
<head>
<title>chat</title>
<!-- custamize css file -->
<!-- <script src="../js/chatAjax.js"></script> -->
<style>
	        .msg-frame{
			overflow-y: scroll;
			width: 100%;
            height: 50%;
            position: absolute;
            background: red;
			}
			.userText{
                width:auto;
                display:inline-block;
                padding:10px;
                text-align: right;
                padding-inline-end: 20px; 
                writing-mode: horizontal-tb;
                /* float: right; */
				border-radius: 20px;
				background-color:rgba(0,255,0,1);
				color: #222;
			}

			.gestText{
				width:auto;
                display:inline-block;
				padding:10px;
				/* float: left; */
				border-radius: 20px;
				background-color:rgba(255,240,0,1);
				color: #222;
			}
		</style>

</head>
<body>
<?php 
session_start();

global $conn;
if($conn==null){
    include_once("connection.php");
}


$sendBy=$_SESSION['username'];
if(isset($_GET['friendchat'])){
    $_SESSION['msgSendTo']=$_GET['friendchat'];
}






echo "<div id='msg-frame'>";

$stm=$conn->prepare("select sendBy, message, datetime from log where (sendBy=? and sendTo=?) OR (sendBy=? and sendTo=?) order by log_id");
 $stm->bindParam(1,$_SESSION['username']);
 $stm->bindParam(2,$_SESSION['msgSendTo']);
 $stm->bindParam(3,$_SESSION['msgSendTo']);
 $stm->bindParam(4,$_SESSION['username']);
 $stm->execute();

 $result=$stm->fetchAll();
 
 foreach($result as $row){

    
			
        $msg=$row['message'];
        $sendby=$row['sendBy'];
        if($sendby == $_SESSION['username']){
       
            echo "<span id='showMsg'><p class='userText'>$sendby: $msg</p><br></span></br>";  
        }else{
            echo "<span id='showMsg'><p class='gestText'>$sendby: $msg</p></span></br>";  
        }
       
    

    // echo"<center><p class='userText'>".$row['sendBy'].": ".$row['message']."    ".$row['datetime']."</p></center><br>";
 }  
 echo "</div>";  
 
 
?>
<input type="textarea" id='msg' class="login-field" value="" placeholder="Type Your Message Here...!"  name="msg"><br>
                <button id='container' name="msg" onclick="saveMsg();showMsg();" class="glyphicon glyphicon-share-alt">Send</button>
				<br><a href='home.php' style="text-decoration:none"><input class="btn btn-primary btn-large btn-block" type='button' value='Back'></input></a>
    
              
<script >


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

    //  $('#container').load('chatting.php');
    // console.log('showMsg'); 
		
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			document.getElementById("showMsg").innerHTML = this.responseText;
			
			}
        };
        
    
       // xhttp.load("chatting.php");
	//xhttp.open("GET", "chatting.php", true);
	
	xhttp.send();


}

//var a = setInterval(showMsg(),1000);




</script>
 
</body>

</html>

