<!DOCTYPE html>
<html>
<head><title>SignOut</title></head>
<body>
<?php
session_start();
session_destroy();
header('Location: loginPHP.php');
?>
</body>
</html>