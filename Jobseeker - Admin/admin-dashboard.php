<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon/jobseeker-icon.png" type="image/x-icon"> 
    <title>Jobseeker Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/basic-layout.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src = "js/stats-chart.js"></script>
    <?php include 'process/include.php';?>
</head>

<style>

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

    #feedback-part h5 {
        margin-top: 15px;
        font-family: Verdana;
        font-size: 17px;
    }

    #feedback-part table {
        margin-top: -5px;
        font-size: 11px;
    }

    #email-column {
        text-align: center;
        width: 20%;
    }
    
    #feedback-column {
        text-align: center;
        width: 30%;
        max-width: 50%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    #date-column {
        text-align: center;
        width: 50%;
    }
    
    #history-part {
        margin-left: 70px;
        height: 245px;
        background-color: coral;
        border: 1px solid gray;
        border-radius: 15px;
    }

</style>

<body>
    <div class = "row">
        <div id = "header" class="col-sm-12">
            <img src="icon/jobseeker-icon.png" alt="">
            <h1>JOBSEEKER</h1>
        </div>
        <div id = "navigation-part" class = "col-sm-2">
            <img src = "icon/admin-icon.png" class = "img-circle">
            <b>Admin</b>
                <a href="">
                    <nav id = "selected-nav">
                        <img src = "icon/dashboard-black-icon.png" style = "margin-right: -6px;">
                        Dashboard
                    </nav>
                </a>
                <a href="admin-user.html">
                    <nav id = "unselected-nav">
                        <img src = "icon/users-black-icon.png" style="height: 50px; width: 50px; margin-right: -4px; margin-left: -10px;">
                        Users
                    </nav>
                </a>
                <a href="admin-feedback.php">
                    <nav id = "unselected-nav">
                        <img src = "icon/feedback-icon.png" style = "height: 40px; width: 40px;">
                        Feedback
                    </nav>
                </a>
                <a href="">
                    <nav id = "unselected-nav">
                        <img src = "icon/logout-icon.png" style="height: 25px; width: 25px; margin-right: 5px;">
                        Logout
                    </nav>
                </a>
        </div>
        <div id = "page-title" class = "col-sm-10">
            <h3>Statistics</h3>
        </div>
        <section id="stats">
            <div id="stats-content" class="col-sm-3">
                <article>
                    <!-- This is where the visualization -->
                    <canvas id="applicantsChart"></canvas>
                    <h4 id="applicantsCount">0</h4>
                    <h5>Applicants</h5>
                </article>
            </div>
            <div id="stats-content" class="col-sm-3" style="margin-left: 25px;">
                <article>
                    <!-- This is where the visualization -->
                    <canvas id="companiesChart"></canvas>
                    <h4 id="companiesCount">0</h4>
                    <h5>Companies</h5>
                </article>
            </div>
            <div id="stats-content" class="col-sm-3" style="margin-left: 25px;">
                <article>
                    <!-- This is where the visualization -->
                    <canvas id="feedbacksChart"></canvas>
                    <h4 id="feedbacksCount">0</h4>
                    <h5>Feedbacks</h5>
                </article>
            </div>
        </section>
        <div id = "feedback-part" class = "col-sm-4">
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
        <div id = "history-part" class = "col-sm-4">
            <section>
                
            </section>
        </div>
    </div>

    <script>
    
    </script>

</body>
</html>