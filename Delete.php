<?php require_once('functions.php') ?>
<?php require_once('sessions.php') ?>
<?php require_once('DB.php') ?>
<?php 
global $ConnectionDB;
global $Connection;
if ($delete_id=$_GET['DeleteStudent']) {
	$delete_id=$_GET['DeleteStudent'];
	$delete_query="DELETE FROM student WHERE id='$delete_id'";
	$run_query=mysqli_query($Connection,$delete_query);
	if ($run_query) {
		$_SESSION['SuccessMessage']="Student Deleted Successfully";
		Redirect_to("thanks.php");
	}else{
		$_SESSION['ErrorMessage']="Failed to Delete Student";
		Redirect_to("thanks.php");
	}

}



 ?>