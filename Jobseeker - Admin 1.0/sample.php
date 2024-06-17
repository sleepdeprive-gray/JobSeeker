<!doctype html>
<html lang="en">
  <head>
    <title>Account</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="account.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>

<style>
    #feedback-display {
        margin-left: 65px;
        height: 450px;
        width: 1100px;
        background-color: lightgreen;
        border-radius: 15px;
    }

    #page-title {
        border-top: 0px;
        margin-top: 60px;
        margin-left: 65px;
    }

    #page-title h3 {
        font-size: 20px;
        font-family: 'Trebuchet MS';
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }


table {
    background-color: white;
    margin-top:;
    width: 100%;
    table-layout: fixed;
    font-size: 15px;
}

th, td {
    margin-top: 50px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    overflow: hidden; /* Hide overflow content */
    text-overflow: ellipsis; /* Add ellipsis (...) for overflow content */
    white-space: nowrap; /* Prevent text from wrapping */
}

.email-column { width: 20%; }
.feedback-column { width: 30%; }
.status-column { width: 20%; }
.date-column { width: 20%; }
.action-column { width: 10%; text-align: center;}

.view-feedback-btn {
    background-color: lightslategray;
    color: white;
    border: 0;
    width: 60px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%; /* Ensure modal covers entire width */
    height: 100%; /* Ensure modal covers entire height */
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%; /* Adjust the width of the modal content */
    max-height: 80%; /* Limit maximum height of the modal content */
    overflow-y: auto; /* Enable vertical scrolling */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add shadow to modal content */
}

.close {
    color: #aaa;
    margin-left: 425px;
    margin-top: -45px;
    margin-bottom: 15px;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.label {
    font-weight: bold;
    font-size: 15px;
    margin-bottom: 5px;
    margin-top: -20px;
}

.pagination {
    margin-top: 0px;
    text-align: right;
}

.pagination a {
    color: black;
    margin: 0 5px;
    text-decoration: none;
    color: #007bff;
    display: inline-block;
    padding-bottom: 2px;
    border-bottom: 1px solid transparent;
    cursor: pointer;
}

.pagination a:hover,
.pagination a.active {
    border-color: #007bff;
}

.pagination a:hover {
    text-decoration: none;
}

.pagination a.active {
    color: brown;
    font-weight: bold;
}

.label-email,
.label-feedback {
    color: black;
    font-size: 15px;
}

#popup-email,
#feedback-content {
    line-height: 1.6; /* Increase line height for readability */
    margin-left: 15px;
}
</style>
  <body>
    <div class="row">
        <div class="col-sm-2" style="background-color: #fff; height: 580px;">
            <img src="logo1.png" alt="Logo1" class="logo1"/>
            <span class="namelog">JobSeekers</span><br>
        <div class="profile">
            <img src="avatar.png" alt="Avatar">
            <div class="profile-info">
                <div class="name">Admin Nicole</div>
                <div class="title">HR Officer</div>
            </div>
        </div>
        <div class="sidebar">
            <a class="nav-link" href="company.html"><i class="fa fa-home"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Dashboard</b></i></a>
            <a class="nav-link" href="applicants.html"><i class="fa fa-clipboard"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Users</b></i></a>
            <a class="nav-link" href="admin-feedback.php"><i class="fa fa-briefcase"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Feedbacks</b></i></a>
            <a class="nav-link" href="#logout"><i class="fa fa-sign-out"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Logout</b></i></a>
        </div>
    </div>
    <div class="col-sm-10" style="background-color: #fff; height: 580px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <div class="navbar">
            <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">
                    <i class="fa fa-angle-down"></i>
                </button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="#"><i class="fa fa-user"></i> Account</a>
                    <a href="#"><i class="fa fa-envelope"></i> Message</a>
                    <a href="#"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
            <p class="name1">ADMIN</p>
            <img src="avatar.png" alt="Avatar" class="avatar"/>
            <i class='fa fa-bell' style="float: right; margin-top: 12px; margin-right: 5px;"></i>
            <input type="text" placeholder="Search" class="search">

           <!-- Add here -->
        
<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<script src="https://d3js.org/d3.v6.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>