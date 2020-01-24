<!DOCTYPE html>
<html>
<head>
    <title>FindFriends</title>

    <!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap.css">  -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/css/addFriends.css">
</head>
<body style="background-color:black">
<!-- <body> -->
<?php 
    global $conn;
    if($conn==null){
    include_once("connection.php");

    echo "<div class='jumbotron'>
    <h1><i class='fas fa-users'></i> Find Friends</h1>
    <p><i>'Since there is nothing so well worth having as friends, never lose a chance to make them.'</i></p>
  </div>";

  //  echo '<h1 align="Center">Find Friends</h1>';

    session_start();
    if(isset($_SESSION['RSS'])){
     echo "<p><strong>".$_SESSION['RSS']."</strong></p><hr>";
   }
   $_SESSION['RSS']=null;
  
   $result=array();
   $result1=array();
   $result2=array();

    $stm1=$conn->prepare("Select username from registration where username!=?");
    $stm1->bindParam(1,$_SESSION['username']);
    $stm1->execute();
   // $result1=$stm1->fetchAll();

    // Loop through the $files (each representing an image)
   // $html = '';

    // foreach ($row=$stm1->fetch() as $img)
    // {
    // // Assuming the db query returned an object, adapt for array otherwhise
    // $html .= "<li><a href='#' id='link'><img src='data:".$img->imgtype.";base64,".base64_encode($img->profilepic)."'height='80' width='80'/> ".$_SESSION['username']."</a></li>";
                
    // // $html .= '<li><img src="'.$img->path.'" alt=""></li>';
    // }

    $i=0;
    while($row=$stm1->fetch()){
        $result1[$i]=$row["username"];
        // $result1[$i]=$row["imgtype"];
        // $result1[$i]=$row["profilepic"];
     //   echo "<li><a href='#' id='link'><img src='data:".$row["imgtype"].";base64,".base64_encode($row["profilepic"])."'height='80' width='80'/></a></li>";
        $i++;
    }


    $stm2=$conn->prepare("Select sendTo from request where sendBy=?");
    $stm2->bindParam(1,$_SESSION['username']);
    $stm2->execute();
    //$result2=$stm2->fetchAll();
    $j=0;
    while($row=$stm2->fetch()){
        $result2[$j]=$row["sendTo"];
        $j++;
    }

//   print_r($result1);
  
//   echo "<br><br>";
  
//   print_r($result2);

//   echo "<br><br>";

    $result=array_diff($result1,$result2);

//  print_r($result);
//  echo "<br><br>";

    if($result){

      $counter=0;
      
    foreach($result as $row){
        //echo "username<br>".$row['username'];
     $counter++;

        $stm3=$conn->prepare("Select imgtype, profilepic from registration where username=?");
        $stm3->bindParam(1,$row);
        $stm3->execute();
        $res=$stm3->fetch();
    
 
    echo "<div class='row'>";

	    echo "<div class='col-lg-4 col-sm-6'>";
       // echo "<div class='thumbnail'>";
    
       echo "<img src='data:".$res["imgtype"].";base64,".base64_encode($res["profilepic"])."'height='100' width='100'/>";
       echo "<p><a style='color:#ecf0f1;' href='request.php?sendto=".$row."'><h4><i class='fas fa-handshake'></i>  <b>".$row."</b></h4></a></p>";

      // echo "</div>";
       echo "</div>";
       

      
       

    
  
    //    if($counter % 4 == 0){

    //     // echo a <br> and next image will start a new row
    //     echo '<br><hr>';
        
    // }

   
       
            //     echo '<div>
            //    <label> Username: '.$row['username'].'<br> FullName:'.$row['fullname'].'<br><br></label>
            //    <button type="button">Add Friend</button>
            //    <button type="button">Remove</button>
            //    <hr></div>';
            }
            echo "</div>"; 
            echo "<br><hr>";
            echo "<a id='previous' href='home.php'><h4><i class='fas fa-backward'></i> <i> Home Page</i></h4></a><br>";
   }
   
    }                
?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>