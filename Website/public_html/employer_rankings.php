<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FakeName.com - Overview</title>
</head>
<body>
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

<p>Show top employers and ratings as links to view review...</p>
<?php
try {
//    $open_review_s_db = new PDO("sqlite:open_review_s_sqlite.db");
    $open_review_s_db = new PDO("sqlite:/Applications/AMPPS/www/Assignment1/open_review_s_sqlite.db");
    $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

try {
    $res = $open_review_s_db->query("SELECT company_name, overall_rating FROM reviewedEmployer_S");
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo $row['company_name'] . " | " . $row['overall_rating'];
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
</body>
</html>

