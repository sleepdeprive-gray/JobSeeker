document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to view feedback buttons
    document.querySelectorAll('.view-feedback-btn').forEach(button => {
        button.addEventListener('click', event => {
            const email = event.target.dataset.email;
            const feedback = event.target.dataset.feedback;
            showFeedbackPopup(email, feedback);
        });
    });

    // Function to show popup/modal with full feedback content
    function showFeedbackPopup(email, content) {
        const feedbackPopup = document.getElementById('feedback-popup');
        const popupEmail = document.getElementById('popup-email');
        const feedbackContent = document.getElementById('feedback-content');

        popupEmail.textContent = email;
        feedbackContent.textContent = content;
        feedbackPopup.style.display = 'block';

        // Close popup when close button or outside of modal is clicked
        const closeBtn = document.querySelector('.close');
        closeBtn.addEventListener('click', () => feedbackPopup.style.display = 'none');
        window.addEventListener('click', event => {
            if (event.target == feedbackPopup) {
                feedbackPopup.style.display = 'none';
            }
        });
    }
});