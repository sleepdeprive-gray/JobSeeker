document.addEventListener("DOMContentLoaded", function() {
    // Modal elements
    var modal = document.getElementById('feedback-popup');
    var popupEmail = document.getElementById('popup-email');
    var feedbackContent = document.getElementById('feedback-content');
    var markReadBtn = document.querySelector('#mark-read-btn');

    // Event listener for 'Mark as Read' button
    markReadBtn.addEventListener('click', function() {
        var email = popupEmail.textContent.trim(); // Extract email from popup

        console.log("Mark as Read button clicked, email: " + email);

        // Send AJAX request to mark feedback as read
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'mark-as-read.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            console.log("AJAX request state changed, readyState: " + xhr.readyState + ", status: " + xhr.status);
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log("AJAX request successful, response: " + xhr.responseText);
                    alert('Feedback marked as read successfully.'); // Alert for successful request
                    closeModal(); // Close the modal
                    location.reload(); // Refresh the current webpage
                } else {
                    console.log("AJAX request failed, status: " + xhr.status);
                    alert('Failed to mark feedback as read.'); // Alert for failed request
                }
            }
        };
        xhr.send('mark_read_email=' + encodeURIComponent(email));
    });

    // Function to open modal and populate content
    function openModal(email, feedback, status) {
        popupEmail.textContent = email;
        feedbackContent.textContent = feedback;
        modal.style.display = 'block'; // Display modal
    }

    // Function to close modal
    function closeModal() {
        console.log("Closing modal");
        modal.style.display = 'none';
    }

    // Event listener for '×' close button
    var closeBtn = document.querySelector('.close');
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            closeModal();
        });
    }

    // Close modal when clicking outside the modal content area
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            closeModal();
        }
    });

    // Sample event listener for view-feedback-btn (ensure this is integrated in your PHP/HTML loop)
    var viewButtons = document.querySelectorAll('.view-feedback-btn');
    viewButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var email = button.getAttribute('data-email');
            var feedback = button.getAttribute('data-feedback');
            var status = button.getAttribute('data-status');

            openModal(email, feedback, status);
        });
    });
});