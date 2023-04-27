<?php
include("init.php");

	if(isset($_POST["signup"]))
	{
		$errors = [];

		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$pwd = $_POST["password"];

		$stmt = mysqli_prepare($link, "SELECT * FROM users WHERE email = ? ");
            
		// Bind the parameters
		mysqli_stmt_bind_param($stmt, "s", $email);
	
		// Execute the statement
		mysqli_stmt_execute($stmt);
	
		// Get the result set
		$result = mysqli_stmt_get_result($stmt);
		if(mysqli_num_rows($result)>0){

			//account already exists
			$errors['signup']="this account already exists, try again please";
			include("signup.php");
			exit();

		}
	 
		$pwd_hash = password_hash($pwd,PASSWORD_DEFAULT);
		// prepare the mysql query statement and bind parameters
		$query = mysqli_prepare($link,"INSERT INTO users ( fname, lname, email, pass) VALUES (?,?,?,?)");
		$query->bind_param("ssss",$fname, $lname, $email, $pwd_hash);
		
 
		$query->execute();
		header("location:login.php");
		
		
	
		// performs the insert query
		//mysqli_query($link,"INSERT INTO user (email,pass,first_name,last_name) VALUES ('$usr', '$pwd_hash', '$fnm', '$lnm')");
 		
		
		mysqli_close($link);
		
		
	}
	else
	{
		print "<a href='signup.php'> Return to the form </a>";
	}




?>