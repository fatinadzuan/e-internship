<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //connect to db
    $dbconn=mysqli_connect('localhost','root','','discussdb') or die(mysqli_error($con));

    
}
?>
