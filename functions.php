<?php  
function Redirect_to($New_Location){
	header("Location:".$New_Location);
	exit();
}


function login(){
	if (isset($_SESSION["UserName"])) {
		return true;
	}
}
function confirm_login(){
	if (!login()) {
		$_SESSION['ErrorMessage']="Login Required";
		Redirect_to("index.php");
	}
}

?>
