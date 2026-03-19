<?php

session_start();
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if($result->num_rows > 0){

$row = $result->fetch_assoc();

if(password_verify($password,$row['password'])){

$_SESSION['user']=$row['name'];

echo "<script>
alert('Login Successful');
window.location.href='index.html';
</script>";

}
else{

echo "<script>alert('Wrong Password');</script>";

}

}
else{

echo "<script>alert('User Not Found');</script>";

}

}

?>