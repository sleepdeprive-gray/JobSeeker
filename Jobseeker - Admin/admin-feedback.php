<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobseeker Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/basic-layout.css">
    <script src="feedback-popup.js"></script>
    <?php include 'process/include.php';?>
</head>

<style>
    #header {
        border: 1px solid black;
    }

    #page-title {
        border-top: 0px;
        margin-top: 10px;
        margin-left: 65px;
    }

    #page-title h3 {
        background-color: cadetblue;
        font-size: 20px;
        font-family: 'Trebuchet MS';
        border-radius: 15px;
    }
    
    #feedback-display {
        margin-left: 65px;
        height: 450px;
        background-color: darkslateblue;
        border: 1px solid gray;
        border-radius: 15px;
    }

    table {
        margin-top: 15px;
        width: 100%;
        table-layout: fixed;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        overflow: hidden; /* Hide overflow content */
        text-overflow: ellipsis; /* Add ellipsis (...) for overflow content */
        white-space: nowrap; /* Prevent text from wrapping */
    }

    .email-column { width: 20%; }
    .feedback-column { width: 40%; }
    .status-column { width: 10%; }
    .date-column { width: 20%; }
    .action-column { width: 10%; }

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
        float: right;
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
        margin-top: 10px; /* Add margin to the top */
    }

    .pagination {
        margin-top: 0px;
        text-align: right;
    }

    .pagination a {
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
        margin-left: 20px; /* Add margin to the left */
        line-height: 1.6; /* Increase line height for readability */
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
            <a href="admin-dashboard.php" style="margin-top: -5px;">
                <nav id="unselected-nav">
                    <img src="icon/dashboard-black-icon.png" style="margin-right: -6px; margin-left: -15px; height: 40px; width: 40px;">
                    Dashboard
                </nav>
            </a>
            <a href="admin-user.html">
                <nav id="unselected-nav">
                    <img src="icon/users-black-icon.png" style="height: 50px; width: 50px; margin-right: -4px; margin-left: -10px;">
                    Users
                </nav>
            </a>
            <a href="admin-feedback.php" style="margin-top: 35px;">
                <nav id="selected-nav">
                    <img src="icon/feedback-icon.png" style="height: 40px; width: 40px; margin-left: -5px;">
                    Feedback
                </nav>
            </a>
            <a href="">
                <nav id="unselected-nav">
                    <img src="icon/logout-icon.png" style="height: 25px; width: 25px; margin-right: 5px;">
                    Logout
                </nav>
            </a>
        </div>
        <div id="page-title" class="col-sm-9">
            <h3>Feedback</h3>
        </div>
        <div id="feedback-display" class="col-sm-9">
            <table class="table">
                <thead>
                    <tr>
                        <th class="email-column">Email</th>
                        <th class="feedback-column">Feedback</th>
                        <th class="status-column">Status</th>
                        <th class="date-column">Date Sent</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($feedbacksResult->num_rows > 0) {
                        while($row = $feedbacksResult->fetch_assoc()) {
                            $shortFeedback = (strlen($row['sender_feedback']) > 25) ? substr($row['sender_feedback'], 0, 25) . "..." : $row['sender_feedback'];
                            echo "<tr>
                                    <td class='email-column'>{$row['sender_email']}</td>
                                    <td class='feedback-column'>{$shortFeedback}</td>
                                    <td class='status-column'>{$row['status']}</td>
                                    <td class='date-column'>{$row['date_sent']}</td>
                                    <td class='action-column'>
                                        <button class='view-feedback-btn' 
                                                data-email='{$row['sender_email']}' 
                                                data-feedback='{$row['sender_feedback']}'>
                                            View
                                        </button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No feedbacks found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($current_page == 1): ?>
                    <a href="admin-feedback.php?page=<?php echo ($current_page); ?>">«</a>
                <?php endif; ?>

                                <?php if ($current_page > 1): ?>
                    <a href="admin-feedback.php?page=<?php echo ($current_page - 1); ?>">«</a>
                <?php endif; ?>

                <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                    <a href="admin-feedback.php?page=<?php echo $i; ?>" <?php if ($i === $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if ($current_page < $totalPages): ?>
                    <a href="admin-feedback.php?page=<?php echo ($current_page + 1); ?>">»</a>
                <?php endif; ?>

                <?php if ($current_page == $totalPages): ?>
                    <a href="admin-feedback.php?page=<?php echo ($current_page); ?>">»</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Popup/modal HTML (hidden by default) -->
        <div id="feedback-popup" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="label-email">
                    <h4>Sender</h4>
                </div>
                <div id="popup-email"></div> 
                <hr>
                <div class="label-feedback">
                    <h4>Feedback</h4>
                </div>
                <div id="feedback-content"></div>
            </div>
        </div>
    </div>
</body>
</html>
