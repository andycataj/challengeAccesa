var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function() {
    $.ajax({
      type: 'POST',
      url: 'check_login.php',
      success: function(response) {
        if (response !== '') {
          $('#loginButton').hide();
          $('#welcomeMessage').html('Welcome, ' + response + '!');
        }
      }
    });
  });


  
