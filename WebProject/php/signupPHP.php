<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<!-- custamize css file -->
<link rel="stylesheet" type="text/css" href="../assets/css/signupHtml.css">
</head>
<body>
<?php 
include_once("../html/signupHtml.html");
 if($_POST){
global $conn;
if($conn==null){
    include_once("connection.php");
}
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $pno=$_POST['pno'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $pic=file_get_contents($_FILES['img']['tmp_name']);
    $pictype=$_FILES['img']['type'];
     
    //echo $pictype;
   // echo "<br>".$name." ".$fname." ".$uname." ".$email." ".$age." ".$pno." ".$pass;
   if($pass===$cpass){

    $stm=$conn->prepare("insert into registration (fullname,fname,username,email,age,phoneno,password,profilepic,imgtype) values(?,?,?,?,?,?,?,?,?)");
    $stm->bindParam(1,$name);
    $stm->bindParam(2,$fname);
    $stm->bindParam(3,$uname);
    $stm->bindParam(4,$email);
    $stm->bindParam(5,$age);
    $stm->bindParam(6,$pno);
    $stm->bindParam(7,$pass);
    $stm->bindParam(8,$pic);
    $stm->bindParam(9,$pictype);
    $row=$stm->execute();
       if($row){
        echo "<br>Registration Successfull!!!";
       header("Location: loginPHP.php");
    }
    else{
        echo "<br>Registration Not Successfull!! ";
        }
    }
    else{
        echo "<br>Password does not Matched!!!";
    }
      
 }
?>
</body>
</html>