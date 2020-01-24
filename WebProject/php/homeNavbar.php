<!-- Home Page Navbar -->

<!-- navbar starts from here-->
<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
               <a class="navbar-brand" href="#" id="link">Chat It Up</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <!-- for chating -->
              <li class="dropdown">
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' id='link'>Chat<span class='caret'></span></a>
             <ul class="dropdown-menu">
             <!-- For friendlist include friendlist.php-->
            <?php include_once("friendlist.php")?>
            </ul>
          </li>
          
          <!-- for Notification -->
              <li class="dropdown">
                <?php 
               //if(isset($_SESSION["NON"])){
                 if($_SESSION["NON"]>0){
                 echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' id='link'><em style='color:red; font-weight:bold; font-size:18px;background-color:lightyellow; border-radius: 50%; display: inline-block;'>".$_SESSION['NON']."</em> <i class='fa fa-bell' aria-hidden='true'></i><span class='caret'></span></a>"; 
                }
                  else {
                 echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' id='link'><i class='fa fa-bell' aria-hidden='true'></i><span class='caret'></span></a>";
                  }
                 // }
           ?>
           <ul class="dropdown-menu">
          <!-- For Notification  People Details include notification.php-->
            <?php include_once("notifications.php")?>
             <li role="separator" class="divider"></li>
              <li><a href="seenRequest.php"><strong>MARK ALL AS SEEN!</strong></a></li>
            </ul>
          </li>
                <li><a href="../php/addFriends.php" id="link">Find Friends <i class="fa fa-users" aria-hidden="true"></i></a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <?php 
                  //session_start();
                  if(isset($_SESSION['username'])){
                    echo "<li><a href='#' id='link'><img src='data:".$_SESSION["imgtype"].";base64,".base64_encode($_SESSION["profilepic"])."'height='20' width='20'/> ".$_SESSION['username']."</a></li>";
                    //echo '<li><a href="#" id="link">'.$_SESSION['username'].'</a></li>';
                  }
                   else{
                       header("Location: loginPHP.php");
                   }
                  ?>
                  <li><a href="../php/signout.php" id="link"><i class="fa fa-address-card" aria-hidden="true"></i> Sign Out</a></li>
                </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
<!-- navbar ends here-->
