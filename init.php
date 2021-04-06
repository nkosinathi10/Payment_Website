<?php
$db = mysqli_connect('localhost','root','','mybank');
if(mysqli_connect_errno())
{
echo 'database connection failed with following error '.mysqli_connect_error();
    die();
}
if(isset($_SESSION['SBuser']))
{
	$user_id = $_SESSION['SBuser'];
	$query = $db->query("SELECT * FROM users WHERE id ='$user_id'");
	$user_data = mysqli_fetch_assoc($query);
	
}
function login($user_id){
	$_SESSION['SBuser'] = $user_id;
	global $db;
	$date = date("Y-m-d H:i:s");
	$db->query("UPDATE users SET last_login = '$date' WHERE id = '$user_id'");
	$_SESSION['success_flash'] = 'you are now logged in';
	header('Location: home.php?id='.$user_id.'');
}