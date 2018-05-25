<?php include 'layout/header.php';
$cat_id = $_GET['id'];
$stmt_delete = $conn->prepare("DELETE FROM tbl_category WHERE cat_id=:cat_id");
$stmt_delete->bindParam(':cat_id', $cat_id);
if($stmt_delete->execute())
{
	echo '<script> window.location.href = "managecategory.php";   </script>';
}


?>