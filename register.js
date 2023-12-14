$(document).ready(function() {
  $('#registerForm').submit(function(event) {
    event.preventDefault(); 

   
    var formData = {
      username: $('#username').val(),
      password: $('#password').val(),
  
    };

    $.ajax({
      type: 'POST',
      url: 'PHP/register.php',
      data: formData,
      dataType: 'json',
      encode: true,
      success: function(response) {
        if (response.success) {
         
          window.location.replace('login.html');
        } else {
          
          $('#error').text(response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
        
        $('#error').text('An error occurred while processing your request.');
      }
    });
  });
});
