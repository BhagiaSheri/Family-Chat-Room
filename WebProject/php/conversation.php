<!DOCTYPE html>
<html>
<head>
<title>Conversation</title>
<!-- custamize css file -->
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="../assets/css/chat.css"> -->

     <!-- <style>
			.mainCant{
				float: left;
			}

			.navCant{
				float: left;
				width: 150px;
			}
			
			.notiCant{
				text-align: center;
				float: left;
				width: 300px;
			}
			
			.notelable{
				padding: 3px;
				text-align: center;
				float: left;
				width: 100px;
				font-size: 14px;
				font-weight: bold;
			}
			
			.sms{
				border-radius: 50px;
				background-color: rgba(255,0,0,0.7);
				color: #f0f0f0;
				float: left;
				width: 30px;
				height: 20px;
				font-size: 14px;
			}
			
			.notelable2{
				padding: 3px;
				text-align: center;
				float: left;
				width: 100px;
				font-size: 14px;
				font-weight: bold;
			}
			
			.request{
				border-radius: 50px;
				background-color: rgba(255,0,0,0.7);
				color: #f0f0f0;
				float: left;
				width: 30px;
				height: 20px;
				font-size: 14px;
			}

			.navi{
				width: 70px;
			}
			
		</style> -->

		<style>
	        /* .msg-frame{
			overflow-y: scroll;
			width: 100%;
			height: 50%;
			position: absolute;
			}
			.userText{
                width:auto;
                display:inline-block;
                padding:10px;
                align: right;
				border-radius: 20px;
				background-color:rgba(0,255,0,1);
				color: #222;
			}

			.gestText{
				width:auto;
                display:inline-block;
				padding:10px;
				align: left;
				border-radius: 20px;
				background-color:rgba(255,240,0,1);
				color: #222;
			} */
		</style>
		<link rel="stylesheet" href="css/style.css">
		<!-- <script src="js/jquery.js"></script> -->
</head>
<body>

          <?php
        // include_once("chatting.php");
         ?> 

        <!-- <div class="login">
		<br/><br/><br/>
			<div id="mydiv" class="login-screen" style="overflow: auto;height:370px;">
				
			</div>
		</div> -->
    
        <form id="myform">
            	<input type="textarea" id='msg' class="login-field" value="" placeholder="Type Your Message Here...!"  name="msg"><br>
                <button name="msg" onclick="saveMsg();showMsg();" class="glyphicon glyphicon-share-alt">Send</button>
				<br><a href='home.php' style="text-decoration:none"><input class="btn btn-primary btn-large btn-block" type='button' value='Back'></input></a>
        </form>
    


 <script src="../js/chatAjax.js"></script>


</body>
</html>