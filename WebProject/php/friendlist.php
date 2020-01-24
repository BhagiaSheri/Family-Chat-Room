<?php 
global $conn;
if($conn==null){
   include_once("connection.php");
}
//list of user friends

$stm=$conn->prepare("Select distinct friend from friends where user=? union Select distinct user from friends where friend=?");
$stm->bindParam(1,$_SESSION['username']);
$stm->bindParam(2,$_SESSION['username']);
$stm->execute();
$result=$stm->fetchAll();
 foreach($result as $row){
   echo "<li><a href='chatFrame.php?friendchat=".$row["friend"]."'><strong>".$row["friend"]."</strong></a></li>";
}
?>