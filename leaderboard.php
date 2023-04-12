<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<script src="scripts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="connectDatabase.js"></script>
<?php
include('connectDatabase.php');
session_start();
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
  <div class="leaderboard">
    <?php
    include('leaderboardGet.php');
    include ('citireUser.php');
    ?>
  </div>
</div>
</body>
</html>
