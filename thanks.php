<?php require_once('functions.php') ?>
<?php require_once('DB.php') ?>
<?php require_once('sessions.php') ?>
<?php echo confirm_login(); ?>
<?php 
global $ConnectionDB;
global $Connection;
	if (isset($_POST["Add"])) {
		$name=mysqli_real_escape_string($Connection,$_POST["name"]);
		$roll=mysqli_real_escape_string($Connection,$_POST["roll"]);
		$marks=mysqli_real_escape_string($Connection,$_POST["marks"]);
		$branch=mysqli_real_escape_string($Connection,$_POST["branch"]);
		

		global $ConnectionDB;
		global $Connection;
		$QueryStudent="INSERT INTO student(name,roll,marks,branch)
		VALUES('$name','$roll','$marks','$branch')";
		$ExecuteStudent=mysqli_query($Connection,$QueryStudent);
		if ($ExecuteStudent) {
			$_SESSION['SuccessMessage']="New Student Added Successfully";
			Redirect_to("thanks.php");
		}else{
			$_SESSION['ErrorMessage']="Failed to Add New Student";
			Redirect_to("thanks.php");
		}
			
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="limiter">
		<div><?php echo Message(); echo SuccessMessage();?></div><br>
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<h3><b>Add Student</b></h3><br>
				<form class="login100-form validate-form flex-sb flex-w" action="thanks.php" method="POST">
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="name" placeholder="Name" >
					</div>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="roll"  placeholder="Roll Number">
					</div>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="marks" placeholder="Marks" >
					</div>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="branch" placeholder="Branch" >
					</div>
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" value="Add" name="Add" type="Submit">
					</div>

				</form>
			</div>
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<a class="btn btn-warning" href="Logout.php">&nbsp;&nbsp;Log out</a><br><br>
				<h3><b>Admin DashBoard</b></h3>
				<br>
				<div class="table-responsive">
				<table class="table table-striped table-hover">
					<h2>Student Details</h2>
					<thead>
						<tr>
							<th >No.</th>
							<th>Name</th>
							<th>Roll Number</th>
							<th>Marks</th>
							<th>Branch</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					global $ConnectionDB;
					global $Connection;
					$ViewQuery="SELECT * FROM student ORDER BY id desc";
					$SrNo=0;
					$ExecuteQuery=mysqli_query($Connection,$ViewQuery);
					while($DataRows=mysqli_fetch_array($ExecuteQuery)){

						$id=$DataRows['id'];
						$name=$DataRows['name'];
						$roll=$DataRows['roll'];
						$marks=$DataRows['marks'];
						$branch=$DataRows['branch'];
						$SrNo++;
					 ?>
						<tr>
							<td><?php echo $SrNo; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $roll; ?></td>
							<td><?php echo $marks; ?></td>
							<td><?php echo $branch; ?></td>
							<td><a href="Delete.php?DeleteStudent=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a></td>
							
						</tr>
					<?php } ?>
						
					</tbody>
						
				</table>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>