<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<script src="scripts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="connectDatabase.js"></script>
<?php
include ('cookie.php');
?>
</head>

<header>
    <div class="topbar">
      <div class="topbar-text">
        <p>ACCESA challenge</p>
        </div>
      <div class="topbar-button">
        <div id="account" class="account" style="display:none">
          <a class="account-text" id="Nume">Nume</a>
          <a class="account-text"> | </a>
          <a class="account-text" id="Puncte">puncte</a>
          <a class="account-text">puncte</a>
      </div>
        <button id="loginButton" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="loginButton">Login</button>
          
      </div>
    </div>
    <div class="meniu">
      <nav>
        <ul>
          <li><a id="homePage" style="display:none" href="index.php">Home</a></li>
          <li><a id="gamesPage" style="display:none" href="jocDeReflexe.php">Games</a></li>
          <li><a id="leaderboardPage" style="display:none" href="leaderboard.php">Leaderboard</a></li>
        </ul>
      </nav>
    </div>
</header>
  

<body>
<div id="dbMessage"></div>
<div id="id01" class="modal">
  
  <form id="loginForm" class="modal-content animate" action="connectDatabase.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Accesa_logo.svg.png" alt="Avatar" class="avatar">
    </div>

    <div class="containerLogin">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required id="username">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="upass" required id="password">


      <button type="submit" class="submitLoginButton" onclick="submitLoginForm()" href="indexLogat.php">Login</button>
      <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>


    </div>

    <div class="containerLoginJos" style="background-color:#f1f1f1">
      <button type="button" class="registerButton" onclick="document.getElementById('id02').style.display='block'">Register</button>
      
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form id="loginForm" class="modal-content animate" action="register.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Accesa_logo.svg.png" alt="Avatar" class="avatar">
    </div>

    <div class="containerRegister">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required id="username">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required id="password">
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email">

      <button type="submit" class="submitRegisterButton" onclick="register.php">Register</button>
    </div>

    <div class="containerLoginJos" style="background-color:#f1f1f1">
      <div id="dbMessage"></div>
    </div>
  </form>
</div>

<div id="pagina" class="pagina">
    <div class="imagineFundal">
      <img src="Accesa_logo.svg.png" alt="Avatar" class="avatar">
      <a>Jocul consta in apasarea unui buton si declansarea unui timer care dupa un timp aleatoriu va declansa schimbarea culorii semaforului si startul numararii milisecundelor pana la atingerea butonului declansator pentru oprirea timer-ului. Utilizatorul, cu cat este mai rapid, cu atat castiga mai multe puncte. </a>
    </div>
</div>
</body>
</html>
