<?php

    session_start();
    $userName=$_SESSION['tusar10'];  
?>
<DOCTYPE html>
<html>
<head>

</head>
<body>
    <h2 ><?php echo "Welcome ".$userName; ?></h2>
    <a href="Users.php">User List</a>
    <br>
    <a href="Logout.php">Logout</a>
</body>
</html>