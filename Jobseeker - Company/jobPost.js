/* When the user clicks on the button, toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn, .dropbtn *')) {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
  }


  // To show the form
  $(document).ready(function() {
    $('#job-form-tab').on('click', function() {
        $('#jobFormModal').modal('show');
    });
});

// Reset

function resetForm() {
  document.getElementById('jobForm').reset();
}