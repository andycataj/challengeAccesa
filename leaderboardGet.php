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
$puncte = "";
$result = mysqli_query($conn, "SELECT Nume, Puncte FROM users ORDER BY Puncte DESC LIMIT 10");

echo "<table>";
echo "<tr><th>Rank</th><th>Name</th><th>Points</th></tr>";
$rank = 1;
while ($row = mysqli_fetch_assoc($result)) {
  $rank_class = "";
  switch ($rank) {
    case 1:
      $rank_class = "gold";
      break;
    case 2:
      $rank_class = "silver";
      break;
    case 3:
      $rank_class = "copper";
      break;
  }
  echo "<tr><td class='$rank_class'>{$rank}</td><td class='$rank_class'>{$row['Nume']}</td><td class='$rank_class'>{$row['Puncte']}</td></tr>";
  $rank++;
}
echo "</table>";
?>
