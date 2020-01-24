<!DOCTYPE html>
<html>
<head>
<title>Chating</title>
<!-- custamize css file -->
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="../assets/css/chat.css">
</head>
<body>


<div class="col-sm-3 col-sm-offset-4 frame">
<div id="chat">

</div>
        <?php
         include_once("chatting.php");
        ?>
        <div>
        
        <!-- <form method="POST" action="showChat.php"> --> 
            <div class="msj-rta macro"> 
                                    
                <div class="text text-r" style="background:whitesmoke !important">
                <center><input id="msg" name="msg" class="mytext" placeholder="Type a message" value=""/></center>
                </div> 

            </div>
            <div style="padding:10px;">
             <button name="msg" onclick="saveMsg();showMsg();" class="glyphicon glyphicon-share-alt">Send</button>
            </div>                
        </div>
        
      <!-- </form>        --> 

        <!-- <form action="showChat.php" method=POST id="myform">
				<center><input type="textarea" class="login-field" 	style="width:100%;height:70px;" value="" placeholder="Type Your Massage Here...!" id="login-pass" name="msg"></center>
				<br><input class="btn btn-primary btn-large btn-block" type="submit" value="Send">
				<br><a href='welcome.php' style="text-decoration:none"><input class="btn btn-primary btn-large btn-block" type='button' value='Back'></input></a>
		</form> -->
    
    </div>  

 <script src="../js/chatAjax.js"></script>


</body>
</html>