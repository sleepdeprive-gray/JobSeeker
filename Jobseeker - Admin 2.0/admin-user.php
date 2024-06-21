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

    #page-title h3 {
        color: black;
        margin-left: 25px;
        margin-top: 45px;
        font-family: 'Trebuchet MS';
    }

    #users-part {
        display: flex;
        justify-content: center;
        height: 481px;
    }

    .content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    #users-content {
        width: 1100px;
        height: 450px;
        padding-top: 15px;
        margin: 0px 5px;
        margin-left: 125px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        border-top-right-radius: 15px;
    }

    #users-table {
        margin-top: 10px;
        width: 950px;
        margin-bottom: 0;
        font-size: 15px;
    }

    #users-table th,
    #users-table td {
        text-align: none;
    }

    #users-table th:first-child,
    #users-table td:first-child,
    #users-table th:nth-child(5),
    #users-table td:nth-child(5),
    #users-table th:nth-child(6),
    #users-table td:nth-child(6) {
        text-align: center;
    }

    #users-table th:first-child, 
    #users-table td:first-child {
        width: 75px;
    }

    .table-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-height: 65vh;
        overflow-y: auto;
    }

    #users-table thead {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 1;
    }

    #users-table th, #users-table td {
        white-space: nowrap;
        text-align: center;
    }

    #users-table tbody {
        background-color: white;
        border-bottom: 1px black;
        display: block;
        max-height: 55vh;
        overflow-y: auto;
    }

    #users-table thead, #users-table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    #delete-button {
        margin-left: 5px;
    }

    #update-button, #delete-button {

        font-size: 12px;
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
                    <?php include 'process/current-admin-login.php';?>
                    <script> var adminName = "<?php echo htmlspecialchars($admin_name); ?>";</script>
                    <div class="name">Admin <?php echo htmlspecialchars($admin_name); ?></div>
                    <div class="title"><?php echo htmlspecialchars($admin_position); ?></div>
                </div>
            </div>
            <div class="sidebar">
                <a class="nav-link" href="admin-dashboard.php"><i class="fa fa-home"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Dashboard</b></i></a>
                <a class="nav-link" href="admin-user.php"><i class="fa fa-user"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Users</b></i></a>
                <a class="nav-link" href="admin-jobs.php"><i class="fa fa-briefcase"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Jobs</b></i></a>
                <a class="nav-link" href="admin-report.php"><i class="fa fa-clipboard"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Report</b></i></a>
                <a class="nav-link" href="admin-feedback.php"><i class="fa fa-bullhorn"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Feedbacks</b></i></a>
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
                        <a href=""><i class="fa fa-user"></i> Account</a>
                        <a href=""><i class="fa fa-envelope"></i> Message</a>
                        <a href=""><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
            </div>
            <p class="name1">ADMIN</p>
            <img src="avatar.png" alt="Avatar" class="avatar"/>
            <i class='fa fa-bell' style="float: right; margin-top: 12px; margin-right: 5px;"></i>

            <div id="page-title" class="col-sm-10">
                <h3>Accounts</h3>
            </div>
            <div id="users-part" class="col-sm-10">
                <article id="users-content">
                    <div class="content-wrapper">
                        <div class="filter-buttons">
                            <input type="text" id="search-bar" placeholder="Search..." class="form-control" style="width: 250px; display: inline-block; margin-right: 100px; height: 50px;">
                            <button id="add-account-btn" class="btn btn-success" data-toggle="modal" data-target="#addAccountModal" style = "margin-right: 50px;">Add Account</button>
                            <button onclick="filterUsers('all')" class="btn btn-primary">All</button>
                            <button onclick="filterUsers('applicant')" class="btn btn-info">Applicants</button>
                            <button onclick="filterUsers('company')" class="btn btn-info">Companies</button>
                            <button onclick="filterUsers('admin')" class="btn btn-info">Admins</button>
                        </div>
                        <div class="table-wrapper">
                            <table id="users-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-table-body">
                                    <?php include 'process/fetch-user.php'; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Modal for adding new account -->
            <div id="addAccountModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 id = "class-title" class="modal-title">Create Account</h3>
                            <button id ="x-button" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Ensure the form has the correct ID -->
                            <form id="add-account-form">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="user-type">User Type</label>
                                    <select class="form-control" id="user-type" required>
                                        <option value="">Select User Type</option>
                                        <option value="applicant">Applicant</option>
                                        <option value="company">Company</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="submit-account-btn">Add Account</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatePasswordModalLabel">Update Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="password" id="newPassword" class="form-control mb-3" placeholder="New Password">
                            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-update-password">Update Password</button>
                        </div>
                    </div>
                </div>
            </div>

        
    <!-- Optional JavaScript -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://d3js.org/d3.v6.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Required Javascript -->

        <script src="add-account.js"></script>
        <script src="users.js"></script>
        <script src="account.js"></script>
        <script type="logout.js"></script>

    </body>
</html>