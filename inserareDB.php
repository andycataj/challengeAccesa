<?php
$servername = "localhost";
$username = "andy";
$password = "andibandi";
$dbname = "site_users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$parola = "";
$nume = "";
$nume = $_COOKIE['nume'];
echo $nume;
$parola = $_COOKIE['parola'];
$puncte = 100;
//header("Location: jocDeReflexe.php");
$score = 0;
$score = $_COOKIE['score'];
transmitere();
function transmitere(){
  
  $mysqli = new mysqli('localhost', 'andy', 'andibandi', 'site_users');

  $query = "UPDATE users SET Puncte = ? WHERE Nume = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param('ii', $score, $nume);
  $stmt->execute();

  echo 'Score updated successfully';
  echo $nume;
}


/*
$query = "SELECT Puncte FROM users WHERE Nume = '$nume' AND Password = '$parola'";
echo $query;
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ss', $nume, $parola);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$points = $row['Puncte'] + $puncte;
$query = "UPDATE users SET Puncte = '$points' WHERE Nume = '$nume' AND Password = '$parola'";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('iss', $points, $nume, $parola);
$stmt->execute();
*/
$conn->close();
?>