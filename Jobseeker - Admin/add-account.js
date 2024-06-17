document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-account-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        // Send data to server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add-account.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Account added successfully');
                        logHistory('Admin', 'Added Account', username); // Log the action with admin name
                    } else {
                        alert(response.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON response: ', e);
                    alert('Error: Unexpected response from server');
                }
            } else {
                alert('Error: Server response error');
            }
        };
        xhr.onerror = function() {
            alert('Error: Failed to send request to server');
        };

        var params = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
        xhr.send(params);
    });

    // Function to log history
    function logHistory(adminName, action, user) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process/log-add-account.php', true); // Adjust URL as per your setup
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        console.log('History logged successfully');
                    } else {
                        console.error('Error logging history: ' + response.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON response: ', e);
                    alert('Error: Unexpected response from server');
                }
            } else {
                console.error('Error logging history: Server response error');
            }
        };
        xhr.onerror = function() {
            console.error('Error logging history: Failed to send request to server');
        };

        var params = 'admin_name=' + encodeURIComponent(adminName) + '&action=' + encodeURIComponent(action) + '&user=' + encodeURIComponent(user);
        xhr.send(params);
    }
});