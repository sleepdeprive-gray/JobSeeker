<!doctype html>
<html lang="en">
  <head>
    <title>Report</title>
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

            <div id="page-title" class="col-sm-10">
                <h3>Report</h3>
            </div>

           <!-- 

                Code Here
                             -->

    <!-- Required JavaScript  -->



        
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