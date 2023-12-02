function loginUser(username, password) {
    $.ajax({
        type: 'POST',
        url: 'php/login.php', // Update with your login endpoint
        data: { username: username, password: password },
        success: function(response) {
            // Handle the login success
            console.log('Login success:', response);
            // Redirect to the profile page
            window.location.href = 'profile.html';
        },
        error: function(error) {
            // Handle login error
            console.error('Login error:', error);
        }
    });
}