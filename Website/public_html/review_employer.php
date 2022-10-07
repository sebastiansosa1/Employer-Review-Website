<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FakeName.com - Review</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="employer_rankings.php">Employer Rankings</a></li>
        <li><a href="review_employer.php">Review an Employer</a></li>
        <li>SignIn / Register</li>
    </ul>
</nav>
<h1>Rate an employer</h1>
<h3>Form for posting a review for an employer:</h3>
<p>Search: bar for selecting an employer to review</p>
<p>Job Title</p>
<p>Employed From: - Employed To:</p>
<p>Rating CEO: Approve, Not approve - No Opinion</p>
<p>Rate: Compensation & Benefits</p>
<p>Rate: Cultural Values</p>
<p>Rate: Diversity & Inclusion</p>
<p>Rate: Senior leadership</p>
<p>Rate: Work-Life balance</p>
<p>Rate: Overall Rating</p>
<p>Recommend to a friend? (Y-N)</p>
<p>Advice (Text box)</p>
<p>Pros and Cons (Text box)</p>
<p>Summary (Text Box)</p>

<?php
try {
//    $open_review_s_db = new PDO("sqlite:open_review_s_sqlite.db");
    $open_review_s_db = new PDO("sqlite:/Applications/AMPPS/www/Assignment1/open_review_s_sqlite.db");
    $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

try {
    $res = $open_review_s_db->query("SELECT company_name, overall_rating FROM reviewedEmployer_S ORDER BY overall_rating DESC;");
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo $row['company_name'] . " | " . $row['overall_rating'] . "\n";
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
</body>
</html>

