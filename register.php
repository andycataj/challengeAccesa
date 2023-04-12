<?php
$servername = "localhost";
$username = "andy";
$password = "andibandi";
$dbname = "site_users";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username="";
$password="";
$email="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
  }
$puncte = 0;

$sql = "SELECT * FROM users WHERE Nume='$username' OR Mail='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  die("Username or email already exists");
}
else {echo $username;echo $password; echo $email; echo $puncte;
}

$sql = "INSERT INTO users (Nume, Password, Puncte, Mail) VALUES ('$username', '$password', '$puncte','$email')";
if (mysqli_query($conn, $sql)) {
  echo "Registration successful";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
