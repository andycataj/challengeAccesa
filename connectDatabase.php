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
$puncte = 0;
$trueOrFalse = false;



if (isset($_COOKIE['nume']) && isset($_COOKIE['parola'])) {
    $nume = $_COOKIE['nume'];
    $parola = $_COOKIE['parola'];

    $sql = "SELECT * FROM users WHERE Nume = '$nume' AND Password = '$parola'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      $puncte = $row['Puncte'];
      $_SESSION['Nume'] = $nume;
      $_SESSION['Password'] = $parola;
      $_SESSION['Puncte'] = $puncte;
      setcookie("nume", $nume, time()+3600);
      setcookie("parola", $parola, time()+3600);
      setcookie("puncte", $puncte, time()+3600);
      
    }
    
}
//echo $puncte;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST["uname"];
    $parola = $_POST["upass"];
}

$sql = "SELECT * FROM users WHERE Nume = '$nume' AND Password = '$parola'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['Nume'] === $nume && $row['Password'] ===$parola){
        $trueOrFalse = true;
        $_SESSION['Nume']=$nume;
        $_SESSION['Password']=$parola;
        setcookie("nume", $nume, time()+3600);
        setcookie("parola", $parola, time()+3600);
        $sql = "SELECT Puncte FROM users WHERE Nume = '$nume'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $puncte = $row['Puncte'];
            $_SESSION['Puncte']=$puncte;
            setcookie("puncte", $puncte, time()+3600); 
        }    
    }
}

if ($trueOrFalse==false) {
    echo '<script>';
    echo 'var loginButton = document.getElementById(\'loginButton\');';
    echo 'loginButton.style.display = \'block\';';
    echo 'var account = document.getElementById(\'account\');';
    echo 'account.style.display = \'none\';';
    echo 'var gamesPage = document.getElementById(\'gamesPage\');';
    echo 'gamesPage.style.display = \'none\';';
    echo 'console.log("e fals")';
    echo '</script>';
    
  }

$conn->close();
?>