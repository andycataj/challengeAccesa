function submitLoginForm() {
  console.log("ready!");
  $("#loginForm").submit(function(event) {
      event.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        type: "POST",
        url: "connectDatabase.php",
        data: formData,
        success: function(result) {
          $("#result").html(result);
        }
      });
    });
    window.location = "indexLogat.php";
}
