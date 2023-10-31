<?php
// Inialize session
session_start();

// Include database connection settings
include('../include/dbconn.php');

if(isset($_POST['login-form'])){
	
	/* capture values from HTML form */
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql= "SELECT email, level_id,password FROM user WHERE email= '$email' AND password= '$password'";
	$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);
	if($row == 0){
	 // Jump to indexwrong page
	header('Location: indexwrong.html'); 
	}
	else{
	 $r = mysqli_fetch_assoc($query);
	 $username= $r['username'];
	 //$password= $r['password'];
	 $level= $r['level_id'];
	 //echo($levelID);
	
		if($level==1) { 
			$_SESSION['email'] = $r['email'];
			// Jump to secured page
			header('Location: ../admin'); 
		} 
		elseif($level==2) {
			$_SESSION['email'] = $r['email'];
			// Jump to secured page
			header('Location: ../login/dashboard');
		}
		else {
			header('Location: index.html');
			//echo($level);
		}
		
	}	
}
mysqli_close($dbconn);
?>