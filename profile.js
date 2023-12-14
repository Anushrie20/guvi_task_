$(document).ready(function() {
  
  function fetchUserProfile() {
    $.ajax({
      type: 'GET',
      url: 'PHP/profile.php',
      dataType: 'json',
      success: function(response) {
       
        $('#username').text(response.username);
        $('#age').text(response.age);
        $('#dob').text(response.dob);
        $('#contact').text(response.contact);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
       
        $('#profileError').text('Failed to fetch profile information.');
      }
    });
  }

  fetchUserProfile();

  
  $('#updateProfileForm').submit(function(event) {
    event.preventDefault();

    var updatedProfileData = {
      age: $('#ageInput').val(),
      dob: $('#dobInput').val(),
      contact: $('#contactInput').val()
      // Add other fields as needed
    };

    $.ajax({
      type: 'POST',
      url: 'PHP/update_profile.php',
      data: updatedProfileData,
      dataType: 'json',
      encode: true,
      success: function(response) {
        if (response.success) {
          // Profile updated successfully, fetch and display updated data
          fetchUserProfile();
          // Optionally show a success message
          $('#profileSuccess').text('Profile updated successfully.');
        } else {
          // Display error message
          $('#profileError').text(response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
        // Display error message
        $('#profileError').text('Failed to update profile information.');
      }
    });
  });
});
