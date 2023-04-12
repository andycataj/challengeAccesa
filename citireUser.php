<?php
$servername = "localhost";
$username = "andy";
$password = "andibandi";
$dbname = "site_users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$parola = $_COOKIE['parola'];
$nume = $_COOKIE['nume'];
$puncte = 0;
if(!isset($_COOKIE['nume'])) {
    echo "Cookie named '" . 'nume' . "' is not set!";
  } 
$sql = "SELECT * FROM users WHERE Nume = '$nume' AND Password = '$parola'";
$result = mysqli_query($conn, $sql);
  
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $puncte = $row['Puncte'];
    
}

$sql = "SELECT Puncte FROM users WHERE Nume = '$nume'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $puncte = $row['Puncte'];
    $_SESSION['Puncte']=$puncte;
    $_SESSION['Nume']=$nume;
}   

echo '<script>';
echo 'var user = document.getElementById(\'Nume\');';
echo "user.innerHTML = '$nume';";
echo 'var user = document.getElementById(\'Puncte\');';
echo "user.innerHTML = '$puncte';";
echo '</script>';

$conn->close();
?>