document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('a[href="#logout"]').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'process/logout.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Logged out successfully.');
                window.location.href = 'login.php';
            } else {
                console.error('Error logging out:', xhr.statusText);
            }
        };
        xhr.onerror = function() {
            console.error('Error: Failed to send request to server');
        };
        xhr.send();
    });
});