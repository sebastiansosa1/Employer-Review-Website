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
    <meta name="description" content="OpenReview is the best known website for employees to leave reviews of employers.
    We have a huge number of people who rate their CEOs, and OpenReview+ reviews provide open-ended pros and cons of working at those companies.">
    <!--                META KEYWORDS                -->
    <meta name="keywords" content="Employer Rankings, Review Employer, Job Review, Top Companies">
    <!--                META AUTHOR                -->
    <meta name="author" content="Sebastian Sosa Salas, Ann Ngo">
    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--                TITLE              -->
    <title>Best Job Review Tool - OpenReview.com</title>

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
<!--    BUILD TITLE AND ICON-->
    <?php
    $open_review_s_db = openConnection();

    if(isset($_GET['employerId'])) {
        $filter_params = $_GET['employerId'];
        $query = "SELECT company_name, company_url
                    FROM employer
                    WHERE employer_id IS $filter_params";
    }
    try {
        $res = $open_review_s_db->query($query);
        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='d-flex justify-content-center'>";
            echo "<h1>" . $row['company_name'] . " Reviews</h1>";
            echo "</div>";
            echo"</br>";
            echo "<div class='d-flex justify-content-center'>";
            echo "<img src= " . "https://api.faviconkit.com/" . trim($row['company_url'], 'http:/') .
                " alt='Avatar' class='avatar'>";
            echo "</div>";
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    ?>
    <br>

            <!--    REVIEW CARDS SORTED BY TIMESTAMP    -->
    <div class="container">
        <?php
//        $open_review_s_db = openConnection();
//        $perPage = 10;
//        if (isset($_GET['page'])) {
//            $page = $_GET['page'];
//        } else {
//            $page = 1;
//        }
//        $startAt = 0;//$perPage * ($page - 1);
//
//        if(isset($_GET['employerId'])) {
//            $filter_params = $_GET['employerId'];
//            $query = "SELECT COUNT(*) AS total
//                    FROM employerReview_S
//                    WHERE employerId IS $filter_params";
//        }
//        try {
//            $res = $open_review_s_db->query($query);
//            $totalPages = ceil($res['total'] / $perPage);

//            $links = "";
//            for ($i = 1; $i <= $totalPages; $i++) {
//                $links .= ($i != $page) ? "<a href='reviews.php?employerId=$filter_params" . "page=$i'>Page $i</a>" : "$page";
//            }

            //$res = $open_review_s_db->query($query);
            if (isset($_GET['employerId'])) {
                $filter_params = $_GET['employerId'];
            } else {
                $filter_params = -1;
            }
            $query = "SELECT * 
                    FROM employerReview_S 
                    WHERE employerId IS $filter_params
                    ORDER BY reviewDateTime DESC
                    LIMIT 0, 10";
            try{
            $open_review_s_db = openConnection();
            $res = $open_review_s_db->query($query);
                while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    $timeStamp = date_parse($row['reviewDateTime']);
                    echo "<div class='card text-left'>";

                    echo "<div class='card-header'>";
                    echo ($row['isCurrentJob']) ? "Former Employee" : "Ex-employee";
                    echo "<p>Overall Rating: " . $row['ratingOverall'] . " / 5</p>";
                    echo "</div>";

                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>" . $row['jobTitle'] . "</h3>";
                    echo "<br>";
                    echo "<h5 class='card-title'>Pros:</h5>";
                    echo "<p class='card-text'>" . $row['pros'] ."</p>";
                    echo "<h5 class='card-title'>Cons:</h5>";
                    echo "<p class='card-text'>" . $row['cons'] ."</p>";
                    echo "<h5 class='card-title'>Advice:</h5>";
                    echo "<p class='card-text'>" . $row['advice'] ."</p>";

                    echo "<h5 class='card-title'>Rating:</h5>";
                    echo "<p>Career Opportunities: " . $row['ratingCareerOpportunities'] . " / 5</p>";
                    echo "<p>Compensation and Benefits: " . $row['ratingCompensationAndBenefits'] . " / 5</p>";
                    echo "<p>Culture and Values: " . $row['ratingCultureAndValues'] . " / 5</p>";
                    echo "<p>Diversity and Inclusion: " . $row['ratingDiversityAndInclusion'] . " / 5</p>";
                    echo "<p>Senior Leadership: " . $row['ratingSeniorLeadership'] . " / 5</p>";
                    echo "<p>Work-Life Balance: " . $row['ratingWorkLifeBalance'] . " / 5</p>";

                    echo "<p>Recommend to a friend: ";
                    echo ($row['ratingRecommendToFriend'] == 'POSITIVE') ? "YES" : "NO";
                    echo "</p>";

                    echo "<h5 class='card-title'>Summary:</h5>";
                    echo "<p class='card-text'>" . $row['summary'] ."</p>";

                    echo "<br><br>";
                    echo "</div>";

                    echo "<div class='card-footer text-muted'>";
                    echo "Reviewed on: " . $timeStamp["day"] . "-" . $timeStamp["month"] . "-" . $timeStamp["year"];
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
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

