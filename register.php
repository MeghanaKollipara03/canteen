<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if($name == "" || $email == "" || $phone == "" || $password == ""){
        echo "Please fill all fields";
        exit();
    }

    $sql = "INSERT INTO users (name,email,phone,password)
            VALUES ('$name','$email','$phone','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Registration Successful</h2>";
        echo "<a href='../login.html'>Go to Login</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();

?>