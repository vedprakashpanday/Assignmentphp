<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
   session_start();
$name= $_POST["Uname"];
$email = $_POST["Uemail"];
$pass = $_POST["Upass"];
$cpass =$_POST["Ucpass"];
 
include("config.php");

$_SESSION['name'] = $name;
      
$errors = [];

if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) 
{
    $errors['name'] = "Name must not be empty and contain only letters and spaces.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
    $errors['email'] = "Enter a valid email address.";
}

if (strlen($pass) < 8 || 
!preg_match('/[A-Z]/', $pass) || 
!preg_match('/[a-z]/', $pass) || 
!preg_match('/[0-9]/', $pass)) {
$errors['pass'] = "Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one number.";
}

if ($pass !== $cpass) {
    $errors['cpass'] = "Confirm Password must match the Password.";
}


if (!empty($errors)) {
    // Return errors as a JSON response
    echo json_encode($errors);
}


else
{
$sql = "INSERT INTO signup(name,email,password,cpassword) VALUES('{$name}','{$email}','{$pass}','{$cpass}')";

    if(mysqli_query($conn,$sql))
    {
        echo json_encode(['success' => true]);
    }
}

}

?>