<?php
if($_SERVER['REQUEST_METHOD']==='POST')
{
    session_start();
    
    $email = $_POST["Uemail"];
    $pass = $_POST["Upass"];
    include("config.php");
 

  $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
    $errors['email'] = "Email MisMatch!!";
}

if (strlen($pass) < 8 || 
!preg_match('/[A-Z]/', $pass) || 
!preg_match('/[a-z]/', $pass) || 
!preg_match('/[0-9]/', $pass)) {
$errors['pass'] = "Password Mismatch!!";
}

if (!empty($errors)) {
    // Return errors as a JSON response
    echo json_encode($errors);
}

else{
$sql = "SELECT name,password FROM signup WHERE email='{$email}'";

  $result = mysqli_query($conn,$sql);
  $row= mysqli_fetch_assoc($result);

  if ($pass == $row['password']) {
    $_SESSION['name'] = $row['name'];
    echo json_encode(['success' => true]);
}
else{
  echo "wrong";
}
    
}
}
?>