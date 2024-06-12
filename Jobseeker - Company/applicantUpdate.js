// Toggle active tab and content
document.querySelectorAll('.folder-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        // Remove active class from all tabs and contents
        document.querySelectorAll('.folder-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.folder-content').forEach(c => c.classList.remove('active'));

        // Add active class to clicked tab and corresponding content
        this.classList.add('active');
        document.querySelector(this.getAttribute('data-target')).classList.add('active');
    });
});

// Function to view applicant details
function viewApplicant(id, name, address, contact, email, status) {
    document.getElementById('applicantId').textContent = id;
    document.getElementById('applicantName').textContent = name;
    document.getElementById('applicantAddress').textContent = address;
    document.getElementById('applicantContact').textContent = contact;
    document.getElementById('applicantEmail').textContent = email;
    document.getElementById('applicantStatus').textContent = status;
    document.getElementById('applicantResume').href = '/path/to/resume/' + id; // Replace with actual resume link
}

// Function to update status
function updateStatus(id, status) {
    alert('Updating status for applicant ID: ' + id + ' to ' + status);
    // Implement the status update logic here
}

// Function to schedule interview
function scheduleInterview(id) {
    alert('Scheduling interview for applicant ID: ' + id);
    // Implement the interview scheduling logic here
}

// Function to update schedule
function updateSchedule(id) {
    alert('Updating schedule for schedule ID: ' + id);
    // Implement the schedule update logic here
}