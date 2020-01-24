<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<!-- custamize css file -->
<link rel="stylesheet" type="text/css" href="../assets/css/loginHtml.css">
</head>
<body>
<?php 
 session_start();
 if(!isset($_SESSION['username'])){
include_once("../html/loginHtml.html");
 if($_POST){
    global $conn;
    if($conn==null){
    include_once("connection.php");
    }
    $un=$_POST['luname'];
    $upass=$_POST['lpass'];
    echo "<br>".$un." ".$upass;

    $stm=$conn->prepare("select * from registration where username=? and password=?");
    $stm->bindParam(1,$un);
    $stm->bindParam(2,$upass);
    $stm->execute();

    $result=$stm->fetch();
    if($result){
        echo "<br>Login Successfull!!!";
       
        $_SESSION["username"]=$un;
        header('Location: home.php');
        include_once("notifications.php");
    }
     else{
    echo "<br>Login Not Successfull!! ";
    }     
 }
}
else{
    header('Location: home.php');
}                 
?>
</body>
</html>