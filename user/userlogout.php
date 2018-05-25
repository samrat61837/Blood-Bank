<?php 
session_start();
session_destroy();
echo ' <script> window.location.href="login_user.php"</script>';
?>
