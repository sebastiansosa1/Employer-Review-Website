<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content=" Best Job Review tool">
    <meta name="keywords" content="Employer Rankings, Review Employer">
    <meta name="author" content="Sebastian Sosa Salas, Ann Ngo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenReviewPlus.com - Overview</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div>

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">-->
            <!--            <span class="navbar-toggler-icon"></span>-->
            <!--        </button>-->
            <!--        <a class="navbar-brand" href="#"><img src="img/E16.jpg " height="40" width="50" alt=""></a>-->
            <div class="collapse navbar-collapse " id="Navbar">

                <img class="nav" src="" alt="">
                <ul class="list-unstyled navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link fa fa-home" href="index.html">Home</a></li>
                    <!--                <li class="nav-item"><a class="nav-link fa fa-overview" href="overview.html">Overview</a></li>-->
                    <li class="nav-item"><a class="nav-link fa fa-rank" href="employer_rankings.php">Employer Rankings</a></li>
                    <li class="nav-item"><a class="nav-link fa fa-review" href="review_employer.php">Review an Employer</a></li>
                    <!--                <li class="nav-item"><a class="nav-link fa fa-sign-in" href="sign_in_page.html">Sign In / Register</a></li>-->
                    <!--                <li class="nav-item"><a class="nav-link fa fa-address-card" href="./contactus.html">Contact Us</a></li>-->
                </ul>
                <!--            <span class="btn fa fa-sign-in" data-toggle="modal" data-target="#loginmodal">Login</span>-->
            </div>
        </div>
    </nav>
<h1>Employer Ratings</h1>
<!--    TODO: Add style to this page, just like: https://nz.indeed.com/companies?from=gnav-homepage-->
<!--    TODO: I might need to add the implementation for the selected company, just like the sketch we made-->
<h2>(This is the overview page - :D )</h2>

<p>Overview Page - Add search bar to browse employers</p>
<div>
    <form action="" method="GET">
        <label>
            <input type="search" name="search" placeholder="Company"
                   value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" >
        </label>
        <button type="submit"> Search </button>
    </form>
</div>

<p>Show top employers and ratings as links to view review...</p>
    <table>
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Reviews Count</th>
            <th>Outlook</th>
            <th>Career Opportunities</th>
            <th>CEO</th>
            <th>Compensation/Benefits</th>
            <th>Culture & Values</th>
            <th>Diversity and Inclusion</th>
            <th>Recommend to a friend</th>
            <th>Senior Leadership</th>
            <th>Work-Life Balance</th>
            <th>Overall Rating</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $open_review_s_db = openConnection();

        if(isset($_GET['search'])) {
            $filter_params = $_GET['search'];
            $query = "SELECT company_name, reviews_count, business_outlook_rating, career_opportunities_rating,
            ceo_rating, compensation_and_benefits_rating, culture_and_values_rating, diversity_and_inclusion_rating, 
            recommend_to_friend_rating, senior_leadership_rating, work_life_balance_rating, overall_rating 
            FROM reviewedEmployer_S
            WHERE company_name LIKE '%$filter_params%'
            ORDER BY overall_rating DESC";

        } else {
            $query = "SELECT company_name, reviews_count, business_outlook_rating, career_opportunities_rating,
            ceo_rating, compensation_and_benefits_rating, culture_and_values_rating, diversity_and_inclusion_rating, 
            recommend_to_friend_rating, senior_leadership_rating, work_life_balance_rating, overall_rating 
            FROM reviewedEmployer_S
            ORDER BY overall_rating DESC";
        }
        try {
            $res = $open_review_s_db->query($query);
            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['company_name'] . "</td>";
                echo "<td>" . $row['reviews_count'] . "</td>";
                echo "<td>" . $row['business_outlook_rating'] . "</td>";
                echo "<td>" . $row['career_opportunities_rating'] . "</td>";
                echo "<td>" . $row['ceo_rating'] . "</td>";
                echo "<td>" . $row['compensation_and_benefits_rating'] . "</td>";
                echo "<td>" . $row['culture_and_values_rating'] . "</td>";
                echo "<td>" . $row['diversity_and_inclusion_rating'] . "</td>";
                echo "<td>" . $row['recommend_to_friend_rating'] . "</td>";
                echo "<td>" . $row['senior_leadership_rating'] . "</td>";
                echo "<td>" . $row['work_life_balance_rating'] . "</td>";
                echo "<td>" . $row['overall_rating'] . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }


        ?>
        </tbody>
    </table>
</div>
    
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-4">
                <h2>Contact Us</h2>
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone"></i>03 369 3999</li>
                    <li><a class="fa fa-envelope" href="https://gmail.com" style="color:white">openreviewplus_customersupport@gmail.com</a>
                    </li>

                </ul>
            </div>


            <div class="col-12 col-sm-4">
                <h2>Address</h2>
                <p>20 Kirkwood Avenue</p>
                <p>Upper Riccarton</p>
                <p>Christchurch, New Zealand</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>©Copyright 2022 INFO263</p>
            </div>
        </div>
    </div>
</footer>
    
</body>
</html>

