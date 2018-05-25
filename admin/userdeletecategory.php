<?php include 'layout/header.php';
$user_id = $_GET['id'];
$stmt_delete = $conn->prepare("DELETE FROM tbl_user WHERE user_id=:user_id");
$stmt_delete->bindParam(':user_id', $user_id);
if($stmt_delete->execute())
{
	echo '<script> window.location.href = "user.php";   </script>';
}


?>