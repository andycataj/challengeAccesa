// Get references to the button, light, and timer elements
const button = document.getElementById('button');
const light1 = document.getElementById('light1');
const light2 = document.getElementById('light2');
const light3 = document.getElementById('light3');
const light4 = document.getElementById('light4');
const light5 = document.getElementById('light5');
const timer = document.getElementById('timer');
const cont = document.getElementById('Nume');
const score = document.getElementById('score');

var puncte = 0;
var totalPuncte = 0;

let isLightOn = false; 
let startTime; 

function updateScore() {
  var score = document.getElementById('score').textContent;
  document.cookie = 'score', score;
  $.ajax({
    url: 'inserareDB.php',
    type: 'POST',
    data: { score: score },
    success: function(response) {
      console.log("Transmis cu succes!");
    },
    error: function(xhr, status, error) {
        console.error('Error updating score:', error);
    }
  });

}

function turnOnLight() {
  
  if (!isLightOn) {
    light1.style.backgroundColor = 'gray';
    light3.style.backgroundColor = 'gray';
    light2.style.backgroundColor = 'gray';
    light4.style.backgroundColor = 'gray';
    light5.style.backgroundColor = 'gray';
    isLightOn = true;
    button.innerHTML = "Apasa-ma!";
    const timeout = Math.floor(Math.random() * 5000) + 1000;
    //console.log(timeout);
    setTimeout(() => {
      turnOffLight();
      startTimer();
    }, timeout);
  }
}


function turnOffLight() {
  light1.style.backgroundColor = 'red';
  light2.style.backgroundColor = 'red';
  light3.style.backgroundColor = 'red';
  light4.style.backgroundColor = 'red';
  light5.style.backgroundColor = 'red';
  isLightOn = false;
}

function updateRez(elapsedTime, ceva) {
  var rezultat = 0;
  var rezultatPuncte = 200;
  var cevaVechi = Math.min(ceva,cevaVechi);
  if(rezultat < elapsedTime)  
    rezultat = elapsedTime;
  if(cevaVechi!=ceva){
    if(rezultat<200&&puncte>100){
      puncte -= 10;
    }
    else if(rezultat<300){
      puncte -= 3;
    }
    else if(rezultat<500){
      puncte -= 1;
    }
    else puncte = 0;
    if(puncte<0) puncte = 0;
    else if(puncte == 200){
      puncte = 0;
      timer.innerHTML = 'NU TRISA!';
    }
    //console.log(puncte);
    rezultatPuncte = Math.min(rezultatPuncte, rezultat);
    score.innerHTML = `${puncte}`;
  } 
}

function adaugareLaRezultat(x) {
  totalPuncte += x;
  console.log(totalPuncte);
  updateDB();
}

function startTimer() {
  var rez = 0;
  var rulare = 1;
  puncte = 200;
  setTimeout(() => {
    startTime = new Date().getTime();
    const intervalId = setInterval(() => {
      const elapsedTime = new Date().getTime() - startTime;
      updateRez(elapsedTime, rulare);
      timer.innerHTML = `Elapsed time: ${elapsedTime} ms`;
      //console.log($puncte);
      button.addEventListener('click', () => {
        clearInterval(intervalId);
      });
    }, 10);
    rulare++;
    var rezultat = document.getElementById('score');
    var rezultatString = rezultat.innerHTML;
    var rezultatInt = parseInt(rezultatString, 10);
    if (isNaN(rezultatInt)) {
      console.error("Failed to convert to integer");
    }
    else adaugareLaRezultat(rezultatInt);
  }, 10);
  
  
}
//button.addEventListener('click', turnOnLight);
