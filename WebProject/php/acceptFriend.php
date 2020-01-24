<?php
global $conn;
if($conn==null){
    include_once("connection.php");
    }
    session_start();
    $friend=$_GET['acceptfriend'];
    $user=$_SESSION['username'];

    // echo $friend;
   // echo $user;
    
    $stm=$conn->prepare("update request SET accept=1, seen=1 where sendBy=? AND sendTo=?");
    $stm->bindParam(1,$friend);
    $stm->bindParam(2,$user);
    $row=$stm->execute();
       if($row){
        $_SESSION['NON']=$_SESSION['NON']-1;
       header("Location: home.php");
      
    }
    else{
        echo "<br>Server Is Low... ";
        }

?>