<?php
session_start();
$sendBy=$_SESSION['username'];
$sendTo=$_GET['sendto'];
global $conn;
if($conn==null){
    include_once("connection.php");
}
    $stm=$conn->prepare("insert into request (sendBy,sendTo) values(?,?)");
    $stm->bindParam(1,$sendBy);
    $stm->bindParam(2,$sendTo);
    $row=$stm->execute();
       if($row){
       $_SESSION['RSS']="Request Send Successfully to ".$sendTo;
       header('Location: addFriends.php');
       }
       else{
        $_SESSION['RSS']="Request Not Send successfully to ".$sendTo;
        header('Location: addFriends.php');
       }
?>