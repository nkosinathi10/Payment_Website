<?php

require_once "init.php";
include "Includes/head.php";
if(isset($_POST['email']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cell = $_POST['cell'];
  $confirm = $_POST['cpassword'];
}
	
        $errors = array();
	if($_POST)
	{
            $emailQuery = $db->query("SELECT * FROM user WHERE email = '$email'");
                $emailCount = mysqli_num_rows($emailQuery);
        if($emailCount != 0)
	{
		$errors [] = 'Email already exist in our database';
	}
		
		if(strlen($password) < 6 )
		{
			$errors[] = 'Password must be atleast 6 characters'; 
		}
		if($password != $confirm){
			$errors[] = 'password do not match';
		}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$errors[] = 'You must enter a valid email';
		}
		
		if(!empty($errors))
		{
			echo display_errors($errors);
		}
		else{
			//add to database
			$hashed = password_hash($password,PASSWORD_DEFAULT);
                     
			$db->query("INSERT INTO user (fullname,email,cell,password) VALUES ('$username','$email','$cell','$hashed')");
			
			header('Location: signin.php');
		}
	}
?>

<div class="container">
  <form action="signup.php" method="POST">
    <h2 class="h2signin">Sign In Form</h2>
    <label for="username">Full Names</label>
    <input type="username" id="username" name="username" placeholder="Nathi Khanyile">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Nathi@gmail.com">
    <label for="cell">cell Number</label>
    <input type="cell" id="cell" name="cell" placeholder="084 420 4026">
    <label for="password">Password</label>
    <input type="Password" id="password" name="password" placeholder="Password">
    <label for="cpassword">Confirm Password</label>
    <input type="password" id="cpassword" name="cpassword" placeholder="Password">
    <hr>
    <button type="submit" class=" btn btn-lg btn-outline-dark" >Sign In</button><br/>
  </form>
</div>

<?php
 include "includes/footer.php";
?>