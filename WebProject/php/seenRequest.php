<?php
global $conn;
if($conn==null){
    include_once("connection.php");
    }
    session_start();
    $user=$_SESSION['username'];

    $stm=$conn->prepare("update request SET seen=1 where sendTo=?");
    $stm->bindParam(1,$user);
    $row=$stm->execute();
       if($row){
       header("Location: home.php"); 
    }
    else{
        echo "<br>Server Is Low... ";
        }

?>