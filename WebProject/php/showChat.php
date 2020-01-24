<?php 
session_start();

//$message=$_POST["msg"];
$message=$_GET["msg"];

global $conn;
 if($conn==null){
 include_once("connection.php");
 }
 if($message!='')
{
 $stm=$conn->prepare("insert into log (sendBy,sendTo,message) values(?,?,?)");
 $stm->bindParam(1,$_SESSION["username"]);
 $stm->bindParam(2,$_SESSION["msgSendTo"]);
 $stm->bindParam(3,$message);
 $row=$stm->execute();
if($row){
     echo "<br>Send Successfully!!!";
     header("Location:chatFrame.php");
    //header("refresh: 3; Location:chatting.php"); 
 }
}  
     header("Location:chatFrame.php");

?>