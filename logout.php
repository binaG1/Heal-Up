<?php

session_start();

session_destroy();

setcookie("remember_user", "", time() - 3600, "/");
setcookie("remember_role", "", time() - 3600, "/");


header("Location: login1.php");
exit;
?> 
