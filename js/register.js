// script.js
function register() {
    // Check if password and confirm password match
    var password = $('#password').val();
    var confirmPassword = $('#confirmPassword').val();
  
    if (password !== confirmPassword) {
      Swal.fire('Registration Failed', 'Password and Confirm Password do not match', 'error');
      return;
    }
  
    // Use jQuery AJAX for registration
    $.ajax({
      type: 'POST',
      url: 'register.php', // Update the URL to your registration endpoint
      data: {
        username: $('#username').val(),
        age: $('#age').val(),
        dob: $('#dob').val(),
        phoneNumber: $('#phoneNumber').val(),
        password: password,
        confirmPassword: confirmPassword
      },
      success: function(response) {
        // Handle the registration response
        Swal.fire({
          title: 'Registration Successful',
          text: response.message,
          icon: 'success',
          confirmButtonText: 'OK'
        }).then(() => {
          // Redirect to login page
          window.location.href = 'login.html';
        });
      },
      error: function(error) {
        Swal.fire('Registration Failed', error.responseJSON.message, 'error');
      }
    });
  }
  