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
            
            // Include adminName in the parameters
            var params = 'action=' + encodeURIComponent(action) + 
                         '&user=' + encodeURIComponent(user) +
                         '&adminName=' + encodeURIComponent(adminName);
            xhr.send(params);
        }

    // Event listener for update password buttons
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-update')) {
            var userId = event.target.dataset.userId;
            var username = event.target.dataset.username;

            // Store userId in modal's dataset
            var updatePasswordModal = document.getElementById('updatePasswordModal');
            updatePasswordModal.dataset.userId = userId;

            // Show modal manually
            var modal = new bootstrap.Modal(updatePasswordModal);
            modal.show();

            // Update password button inside the modal
            var updatePasswordBtn = document.getElementById('btn-update-password');
            updatePasswordBtn.addEventListener('click', function() {
                var newPassword = document.getElementById('newPassword').value;
                var confirmPassword = document.getElementById('confirmPassword').value;

                if (newPassword && confirmPassword) {
                    if (newPassword !== confirmPassword) {
                        alert('Passwords do not match');
                        return;
                    }

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'update-user.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            alert('Password updated successfully');
                            modal.hide(); // Hide modal on success
                            location.reload(); // Refresh page after update
                            logHistory('Updated Password', userId); // Logging update password action
                        } else {
                            alert('Error updating password');
                        }
                    };
                    // Ensure userId is sent along with newPassword
                    xhr.send('user_id=' + encodeURIComponent(userId) + '&password=' + encodeURIComponent(newPassword));
                } else {
                    alert('Please enter and confirm the new password');
                }
            });
        }
    });

    // Event listener for delete account buttons (if still needed)
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

    // Function to filter users based on type (all, applicants, companies, admins)
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

    // Ensure filterUsers is accessible globally
    window.filterUsers = filterUsers;
});
