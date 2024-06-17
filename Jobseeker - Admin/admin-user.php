<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobseeker Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/basic-layout.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="users.js"></script>
    <script src="js/add-account.js"></script>
</head>
<style>
    #page-title h3 {
        background-color: lightgreen;
        color: white;
        margin-left: 25px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        margin-top: 35px;
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
        margin-left: 25px;
        background: lightgreen;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        border-top-right-radius: 15px;
    }

    #users-table {
        margin-top: 10px;
        width: 950px;
        margin-bottom: 0;
    }

    #delete-button {
        margin-left: 15px;
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
        text-align: center; /* Adjust as per your requirement for alignment */
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
</style>

<body>
<div class="row">
    <div id="header" class="col-sm-12">
        <img src="icon/jobseeker-icon.png" alt="">
        <h1>JOBSEEKER</h1>
    </div>
    <div id="navigation-part" class="col-sm-2">
        <img src="icon/admin-icon.png" class="img-circle">
        <b>Admin</b>
        <a href="admin-dashboard.php" style="margin-top: -5px; margin-bottom: 20px;">
            <nav id="unselected-nav">
                <img src="icon/dashboard-black-icon.png" style="margin-right: -6px; margin-left: -15px; height: 40px; width: 40px;">
                Dashboard
            </nav>
        </a>
        <a href="admin-user.php">
            <nav id="selected-nav">
                <img src="icon/users-black-icon.png" style="height: 50px; width: 50px; margin-right: -4px; margin-left: -10px;">
                Users
            </nav>
        </a>
        <a href="admin-feedback.php">
            <nav id="unselected-nav">
                <img src="icon/feedback-icon.png" style="height: 40px; width: 40px;">
                Feedback
            </nav>
        </a>
        <a href="#">
            <nav id="unselected-nav">
                <img src="icon/logout-icon.png" style="height: 25px; width: 25px; margin-right: 5px;">
                Logout
            </nav>
        </a>
    </div>
    <div id="page-title" class="col-sm-10">
        <h3>Accounts</h3>
    </div>
    <div id="users-part" class="col-sm-10">
        <article id="users-content">
            <div class="content-wrapper">
            <div class="filter-buttons">
                <button id="add-account-btn" class="btn btn-success" data-toggle="modal" data-target="#addAccountModal">Add Account</button>
                <input type="text" id="search-bar" placeholder="Search..." class="form-control" style="width: 250px; display: inline-block; margin-right: 275px;">
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
                                <th>Password</th>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title">Create Account</h3>
                    </div>
                    <div class="modal-body">
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
</div>
</div>
</body>
</html>
