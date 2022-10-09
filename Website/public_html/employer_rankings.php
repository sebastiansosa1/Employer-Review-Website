<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FakeName.com - Overview</title>
</head>
<body>
<div>

<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="employer_rankings.php">Employer Rankings</a></li>
        <li><a href="review_employer.php">Review an Employer</a></li>
        <li>Sign In / Register</li>
    </ul>
</nav>
<h1>Employer Ratings</h1>

<p>Overview Page - Add search bar to browse employers</p>
<div>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Company"
               value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" >
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
        try {
            $open_review_s_db = new PDO("sqlite:/Applications/AMPPS/www/Assignment1/open_review_s_sqlite.db");
            $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

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
<?php
//    try {
//    //    $open_review_s_db = new PDO("sqlite:open_review_s_sqlite.db");
//        $open_review_s_db = new PDO("sqlite:/Applications/AMPPS/www/Assignment1/open_review_s_sqlite.db");
//        $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    } catch (PDOException $e) {
//        die($e->getMessage());
//    }
//
//    try {
//        $res = $open_review_s_db->query("SELECT company_name, overall_rating FROM reviewedEmployer_S");
//        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
//            echo $row['company_name'] . " | " . $row['overall_rating'];
//        }
//    } catch (PDOException $e) {
//        die($e->getMessage());
//    }
//?>

</div>
</body>
</html>

