<?php

session_start();

include('init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['userEmail'];
    $passwd = $_POST['userpasswd'];

    $errors = [];
   
    if(empty($email)){
     $errors['userEmail']="You need to provide an email";
    }
   if(empty($passwd)){
        $errors['userpasswd']="You need to provide a password";
    }
  
   if(!empty($errors)){  
    include('login.php');
   }
    //no errors in the form 
    $stmt = mysqli_prepare($link, "SELECT * FROM users WHERE email = ? AND pass = ?");
            
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ss", $email, $passwd);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);
    
    $r=mysqli_fetch_row($result);
   
    
    // Check if a row 
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['fname']=$r['1'];
        $_SESSION['lname']=$r['2'];
       
        header("location: search-result.php");
       
    } else {
        
        $errors['userpasswd'] = "Invalid user's email or password ";
        include('login.php');
        exit();
    }

   
}

?>
