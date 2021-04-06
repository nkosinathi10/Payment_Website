<?php
  include "Includes/head.php";
  require_once "init.php";
  if(isset($_POST['email'])){
	$email = $_POST['email'];
	$email = trim($email);
	$password = $_POST['password'];
	$password = trim($password);
	$errors = array();
  }

if($_POST)
   {
	   if(empty($_POST['email']) || empty($_POST['password']))
	   {
		   $errors[] = 'you must provide email and password';
	   }
	   //validaTE email
	   if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	   {
		   $errors[] = "you must enter a valid email";
	   }
	   
	   //checck password
	   if(strlen($password)< 6)
	   {
		   $errors[] = "password must be atleast 6 characters.";
	   }
	   
	   $query = $db->query("SELECT * FROM user WHERE email = '$email'");
	   $user = mysqli_fetch_assoc($query);
	   $userCount = mysqli_num_rows($query);
           if(!password_verify($password,$user['password']))
	   {
		   $errors [] ="wrong password.";
	   }
	   if($userCount < 1)
	   {
		   $errors [] = "User does not exist";
	   }
	   if(!empty($errors))
	   {
		   echo display_errors($errors);
	   }else{
		   // log user in
		   $user_id = $user['userid'];
		   login($user_id);
	   }
	   
   }
?>
<div class="container">
  <form action="signin.php" method="POST">
    <h2 class="h2signin">Sign In Form</h2>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Nathi@gmail.com">

    <label for="password">Password</label>
    <input type="Password" id="Password" name="password" placeholder="password">
    <hr>
    <button type="submit" class=" btn btn-lg btn-outline-dark" >Sign In</button><br/>
  </form>
</div>
<?php
 include "includes/footer.php";
?>
