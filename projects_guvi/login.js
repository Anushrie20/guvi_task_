$(document).ready(function() {
    $('#loginForm').submit(function(event) {
      event.preventDefault(); 
  
     
      var formData = {
        username: $('#username').val(),
        password: $('#password').val()
      };
  
      
      $.ajax({
        type: 'POST',
        url: 'PHP/login.php',
        data: formData,
        dataType: 'json',
        encode: true,
        success: function(response) {
          if (response.success) {
            
            window.location.replace('profile.html');
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
  