<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--                META CHARSET                -->
    <meta charset="UTF-8">
    <!--                META VIEWPORT                -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--                META EDGE                -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--                META DESCRIPTION                -->
    <meta name="description" content="OpenReview+ is the best known website for employees to leave reviews of employers.
    We have a huge number of people who rate their CEOs, and OpenReview+ reviews provide open-ended pros and cons of working at those companies.">
    <!--                META KEYWORDS                -->
    <meta name="keywords" content="Employer Rankings, Review Employer, Job Review, Top Companies">
    <!--                META AUTHOR                -->
    <meta name="author" content="Sebastian Sosa Salas, Ann Ngo">
    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--                TITLE              -->
    <title>Best Job Review Tool - OpenReviewPlus.com</title>

    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#navbar').load('components/navbar.html');
            $('#footer').load('components/footer.html');
        });
    </script>
</head>

<body>

<div id="navbar"></div>

<main style="background-color: rgb(230, 243, 218)">
    <div class="d-flex justify-content-center">
        <h1>Employer Ranking</h1>
    </div>
    <div class="d-flex justify-content-center">
        <h5>The best ranked employers</h5>
    </div>


    <div class="container">
        <form class="d-flex" role="search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search Company" aria-label="Search"
                   name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br/>
    <div class="container">

        <?php
        $open_review_s_db = openConnection();

        if(isset($_GET['search'])) {
            $filter_params = $_GET['search'];
            $query = "SELECT employer_id, company_name, company_hq, company_url, reviews_count, business_outlook_rating, career_opportunities_rating,
                    ceo_rating, compensation_and_benefits_rating, culture_and_values_rating, diversity_and_inclusion_rating, 
                    recommend_to_friend_rating, senior_leadership_rating, work_life_balance_rating, overall_rating 
                    FROM reviewedEmployer_S
                    WHERE company_name LIKE '%$filter_params%'
                    ORDER BY overall_rating DESC";

        } else {
            $query = "SELECT employer_id, company_name, company_hq, company_url, reviews_count, business_outlook_rating, career_opportunities_rating,
                    ceo_rating, compensation_and_benefits_rating, culture_and_values_rating, diversity_and_inclusion_rating, 
                    recommend_to_friend_rating, senior_leadership_rating, work_life_balance_rating, overall_rating 
                    FROM reviewedEmployer_S
                    ORDER BY overall_rating DESC";
        }
        try {
            $res = $open_review_s_db->query($query);
            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card'>";
                echo "<h5 class='card-header'>";
                echo "<img src= " . "https://api.faviconkit.com/" . trim($row['company_url'], 'http:/') .
                    " alt='Avatar' class='avatar'>". "  " . $row['company_name'] . "</h5>";
                echo "<div class='card-body'>";
                echo "<h6 class='card-title'>" . $row['company_hq'] . "</h6>";
                echo "<p class='card-text'>Rating: " . $row['overall_rating'] . " out of 5</p>";
                echo "<p class='card-text'>" . $row['reviews_count'] . " reviews</p>";
                echo "<a href=" . "reviews.php?employer=" . $row['employer_id'] . " class='btn btn-primary'>Show reviews</a>";
                echo "<a href=" . $row['company_url'] . " class='btn btn-secondary'>See their website</a>";
                echo "</div>";
                echo "</div>";
                echo"</br>";
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        ?>
    </div>




</main>


<!--            FOOTER           -->
<div id="footer"></div>

<!--            SCRIPTS            -->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"-->
<!--            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"-->
<!--            crossorigin="anonymous"></script>-->

<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" -->
<!--            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" -->
<!--            crossorigin="anonymous"></script>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>

</body>
</html>

