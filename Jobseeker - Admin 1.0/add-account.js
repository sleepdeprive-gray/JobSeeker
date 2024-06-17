document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submit-account-btn').addEventListener('click', function() {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var userType = document.getElementById('user-type').value;

        // Send data to server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add-account.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Check response
                if (xhr.responseText.trim() === 'success') {
                    alert('Account added successfully');
                    logHistory('Admin', 'Added Account', username); // Log the action with admin name
                    // Clear form or perform other actions upon success
                    document.getElementById('username').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('password').value = '';
                    document.getElementById('user-type').value = '';

                    // Close the modal
                    $('#addAccountModal').modal('hide');

                    // Reload or refresh the page
                    location.reload();
                } else {
                    alert('Error: ' + xhr.responseText);
                }
            } else {
                alert('Error: Server response error');
            }
        };
        xhr.onerror = function() {
            alert('Error: Failed to send request to server');
        };

        var params = 'username=' + encodeURIComponent(username) +
                     '&email=' + encodeURIComponent(email) +
                     '&password=' + encodeURIComponent(password) +
                     '&user_type=' + encodeURIComponent(userType);
        xhr.send(params);
    });

    // Function to log history
    function logHistory(adminName, action, user) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'log-history.php', true); // Adjust URL as per your setup
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('History logged successfully');
            } else {
                console.error('Error logging history: Server response error');
            }
        };
        xhr.onerror = function() {
            console.error('Error logging history: Failed to send request to server');
        };

        var params = 'admin_name=' + encodeURIComponent(adminName) +
                     '&action=' + encodeURIComponent(action) +
                     '&user=' + encodeURIComponent(user);
        xhr.send(params);
    }
});