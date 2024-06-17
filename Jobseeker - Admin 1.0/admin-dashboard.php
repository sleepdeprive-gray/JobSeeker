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

    #page-title {
        margin-top: 50px;
    }

    #stats-content {
    /* height: 485px; */
        height: 225px;
        background-color: rgb(227, 230, 229); 
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-left: 30px;
        margin-bottom: 5px;
        border: 1px solid rgb(186, 182, 182);
        border-radius: 15px;
    }

    #stats h4 {
        margin-top: -15px;
        font-size: x-large;
        font-family: Geneva;
    }

    #stats h5 {
        margin-top: -5px;
        font-family: Verdana;
        font-size: 17px;
    }

    article {
        padding-right: 5px;
    }

    #feedback-part {
        margin-left: 70px;
        height: 245px;
        background-color: rgb(171, 132, 207);
        border-radius: 15px;
        border: 1px solid gray;
    }

    #feedback-part h5, #history-part h5{
        margin-top: 15px;
        font-family: Verdana;
        font-size: 17px;
    }

    #feedback-part table, #history-part table {
        margin-top: -5px;
        font-size: 11px;
    }

    #email-column {
        width: 20%;
    }
    
    #feedback-column {
        width: 30%;
        max-width: 50%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    #date-column {
        width: 50%;
    }
    
    #history-part {
        margin-left: 55px;
        margin-right: 20px;
        height: 245px;
        background-color: coral;
        border: 1px solid gray;
        border-radius: 15px;
    }

    #history-part tr {
        background-color: coral;
    }

    article h2 {
        font-size: 45px;
        margin-bottom: 25px;
        
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
            <a class="nav-link" href="admin-dashboard.php"><i class="fa fa-home"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Dashboard</b></i></a>
            <a class="nav-link" href="admin-user.php"><i class="fa fa-clipboard"><b style="margin-left: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Users</b></i></a>
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

           <!-- Add here -->

           
        <div id = "page-title" class = "col-sm-10">
            <h3>Statistics</h3>
        </div>
     <div class="container">
        <div class="row">
            <!-- Statistics Section -->
            <div class="col-sm-4">
                <div id="stats-content">
                    <article class="applicant-count">
                        <h2 class="count">Loading...</h2>
                        <h5>Applicants</h5>
                    </article>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="stats-content">
                    <article class="company-count">
                        <h2 class="count">Loading...</h2>
                        <h5>Companies</h5>
                    </article>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="stats-content">
                    <article class="feedback-count">
                        <h2 class="count">Loading...</h2>
                        <h5>Feedbacks</h5>
                    </article>
                </div>
            </div>
            <div id = "feedback-part" class = "col-sm-5">
                <?php include 'process/fetch-feedback.php';?>
                    <section id = "recent-feedback">
                        <h5>Recent Feedback</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th id="email-column">Email</th>
                                    <th id="feedback-column">Feedback</th>
                                    <th id="date-column">Date Sent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td class='email-column'>{$row['sender_email']}</td>
                                                <td class='feedback-column'>{$row['sender_feedback']}</td>
                                                <td class='date-column'>{$row['date_sent']}</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No feedbacks found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            <div id = "history-part" class = "col-sm-5">
            <?php include 'process/fetch-history.php';?>
                <section id="history-section">
                    <h5>History</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Admin</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['admin_name']}</td>
                                            <td>{$row['action']}</td>
                                            <td>{$row['user_id']}</td>
                                            <td>{$row['time']}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No history found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <script src = "stats-fetch.js"></script>
    <?php include 'process/include.php';?>
        
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