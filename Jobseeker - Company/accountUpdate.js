// JavaScript for handling form submissions
document.getElementById('companyDetailsForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Get form values
    var companyId = document.getElementById('companyId').value;
    var companyName = document.getElementById('companyName').value;
    var companyEmail = document.getElementById('companyEmail').value;
    var companyLocation = document.getElementById('companyLocation').value;
    // Perform your AJAX request or other logic here
    console.log('Updating company:', { companyId, companyName, companyEmail, companyLocation });
    alert('Company updated successfully!');
});

document.getElementById('createCompanyForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Get form values
    var newCompanyName = document.getElementById('newCompanyName').value;
    var newCompanyEmail = document.getElementById('newCompanyEmail').value;
    var newCompanyPassword = document.getElementById('newCompanyPassword').value;
    var newCompanyLocation = document.getElementById('newCompanyLocation').value;
    // Perform your AJAX request or other logic here
    console.log('Creating company:', { newCompanyName, newCompanyEmail, newCompanyPassword, newCompanyLocation });
    alert('Company created successfully!');
});