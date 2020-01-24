<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<!-- Other Links -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!-- Customize CSS files -->
<link  rel="stylesheet" type="text/css" href="../assets/css/home.css">
<!-- <link rel="stylesheet" type="text/css" href="../assets/css/slidebar.css"> -->

</head>
<body>
 <?php 
 global $conn;
 if($conn==null){
     include_once("connection.php");
 }
 //session_start();
 $un=$_SESSION['username'];
 $stm=$conn->prepare("select imgtype, profilepic from registration where username=?");
 $stm->bindParam(1,$un);
 $stm->execute();
 $result=$stm->fetch();

 $_SESSION['imgtype']= $result["imgtype"];
 $_SESSION['profilepic']= $result["profilepic"];

 //header("Location: home.php");

 
//  echo "<img src='data:".$result["imgtype"].";base64,".base64_encode($result["profilepic"])."'height='25' width='25'/>";
 ?>

</body>
</html>