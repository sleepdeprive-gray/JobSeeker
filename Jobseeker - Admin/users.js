document.addEventListener('DOMContentLoaded', function() {
    // Function to log history
    function logHistory(action, user) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process/log-history.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('History logged successfully');
            } else {
                console.error('Error logging history');
            }
        };
        
        var params = 'action=' + encodeURIComponent(action) + '&user=' + encodeURIComponent(user);
        xhr.send(params);
    }

    // Event listener for update password buttons
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-update')) {
            var userId = event.target.dataset.userId;
            var newPassword = document.getElementById('password_' + userId).value;
            if (newPassword) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'update-user.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('Password updated successfully');
                        logHistory('Updated Password', userId); // Logging update password action
                    } else {
                        alert('Error updating password');
                    }
                };
                xhr.send('user_id=' + encodeURIComponent(userId) + '&password=' + encodeURIComponent(newPassword));
            } else {
                alert('Please enter a new password');
            }
        }
    });

    // Event listener for delete account buttons
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-delete')) {
            var userId = event.target.dataset.userId;
            var username = event.target.dataset.username;
            if (confirm('Are you sure you want to delete ' + username + '?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'process/delete-user.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('User deleted successfully');
                        logHistory('Deleted Account', userId); // Logging delete account action
                        location.reload(); // Refresh page after deletion
                    } else {
                        alert('Error deleting user');
                    }
                };
                xhr.send('user_id=' + encodeURIComponent(userId));
            }
        }
    });

    // Function to filter users based on type (all, admins, job seekers)
    function filterUsers(type) {
        var rows = document.querySelectorAll('#users-table-body tr');
        rows.forEach(function(row) {
            if (type === 'all' || row.dataset.type === type) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Event listener for search bar input
    document.getElementById('search-bar').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        var rows = document.querySelectorAll('#users-table-body tr');
        rows.forEach(function(row) {
            var username = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
            var email = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            if (username.includes(searchText) || email.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    window.filterUsers = filterUsers; // Ensure filterUsers is accessible globally
});