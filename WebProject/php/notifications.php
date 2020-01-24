<?php 
global $conn;
if($conn==null){
   include_once("connection.php");
}
// session_start();

//no: of notification
$stm=$conn->prepare("Select COUNT(*) from request where sendTo=? AND accept=0");
$stm->bindParam(1,$_SESSION['username']);
$stm->execute();
$rows=$stm->fetch();
$noOfNotifications=$rows[0];
$_SESSION['NON']=$noOfNotifications;

//list of notifications
$stm=$conn->prepare("Select sendBy from request where sendTo=? AND accept=0");
$stm->bindParam(1,$_SESSION['username']);
$stm->execute();
$result=$stm->fetchAll();
 foreach($result as $row){
   echo "<li><a href='acceptFriend.php?acceptfriend=".$row["sendBy"]."'><strong>".$row["sendBy"]."</strong> has send you a friend request! </a></li>";
}
?>