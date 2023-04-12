<!DOCTYPE html>
<html>
<head>
<title>Light Game</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="lightStyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
include('inserareDB.php');
?>
</head>

<header>
    <div class="topbar">
      <div class="topbar-text">
        <p>ACCESA challenge</p>
        </div>
      <div class="topbar-button">
        <div id="account" class="account" style="display:block">
          <a class="account-text" id="Nume">Nume</a>
          <a class="account-text"> | </a>
          <a class="account-text" id="Puncte">puncte</a>
          <a class="account-text">puncte</a>
      </div>
      </div>
    </div>
    <div class="meniu">
      <nav>
        <ul>
          <li><a id="homePage" href="indexLogat.php">Home</a></li>
          <li><a id="gamesPage" href="jocDeReflexe.php">Games</a></li>
          <li><a id="leaderboardPage" href="leaderboard.php">Leaderboard</a></li>
        </ul>
      </nav>
    </div>
</header>
<body>
<div id="pagina" class="pagina">
<div id="joc">
    <button id="button" onclick="turnOnLight();">Start joc! (apasa de doua ori)</button>
    <div class="lumini">
        <div id="light1" style="width: 100px; height: 100px;"></div>
        <div id="light2" style="width: 100px; height: 100px;"></div>
        <div id="light3" style="width: 100px; height: 100px;"></div>
        <div id="light4" style="width: 100px; height: 100px;"></div>
        <div id="light5" style="width: 100px; height: 100px;"></div>
    </div>
    <div id="timer" class="timer"></div>
    <div id="score" class="score"></div>
    
    <button id="trimitereDate" onclick="updateScore()">STOP</button>
  </div>

</div>

<div class="infoJoc"  id="infoJoc">
  <a>Pentru a porni jocul (uneori) trebuie apasat de doua ori pe butonul de start.</a>
</div>

<div id="dbMessage"></div>

<script src="light.js"></script>
<?php
    include ('citireUser.php');
    ?>
</body>
</html>
