document.querySelectorAll('.folder-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.folder-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.folder-content').forEach(content => content.classList.remove('active'));
        this.classList.add('active');
        document.querySelector(this.dataset.target).classList.add('active');
    });
});

function viewJob(id, title, type, company, address, date) {
    document.getElementById('jobId').value = id;
    document.getElementById('jobTitleDetail').value = title;
    document.getElementById('jobTypeDetail').value = type;
    document.getElementById('jobCompany').value = company;
    document.getElementById('jobAddress').value = address;
    document.getElementById('jobPostDateDetail').value = date;
}

function updateJob() {
    // Implement update logic here
    alert('Job details updated successfully!');
    $('#jobModal').modal('hide');
}

function cancelJob() {
    // Implement cancel logic here
    alert('Job cancelled successfully!');
    $('#jobModal').modal('hide');
}

function resetForm() {
    document.getElementById('jobForm').reset();
}