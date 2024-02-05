$(document).ready(function() {
    $('#signupBtn').on('click', function() {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: 'signup.php',
            data: { username: username, email: email, password: password },
            success: function(response) {
                console.log(response);
                // Handle success and redirection to the profile page
                window.location.href = 'profile.php';
            },
            error: function(error) {
                console.error(error);
                // Handle error
            }
        });
    });
});
