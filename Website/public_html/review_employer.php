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
<form action="" method="GET">
    <label><br>Select a company to review:<br></label>
    <input type="search" name="select_company" placeholder="Company Name" required
           value="<?php if(isset($_GET['select_company'])){ echo $_GET['select_company']; } ?>" >
    <button type="submit"> Search </button>
</form>

<form action="" method="POST">
    <label><br>Job Title:<br></labeL>
    <input type="text" name="job_title" placeholder="Job Title" required
           value="<?php if(isset($_GET['job_title'])){ echo $_GET['job_title']; } ?>" >

    <label><br>Employed From:<br></label>
    <input type="date" name="employed_from" placeholder="Select Date" required
           value="<?php if(isset($_GET['employed_from'])){ echo $_GET['employed_from']; } ?>" >
    <label><br>Employed To:<br></label>
    <input type="date" name="employed_to" placeholder="Select Date" required
           value="<?php if(isset($_GET['employed_to'])){ echo $_GET['employed_to']; } ?>" >

    <label><br>CEO:<br></label>
    <select id="CEO" name="CEO" required>
        <option value="APPROVE">Approved</option>
        <option value="DISAPPROVE">Not Approved</option>
        <option value="NO_OPINION">No Opinion</option>
    </select>

    <label><br>Compensation & Benefits<br></label>
    <input list="rate" name="compensation_and_benefits" id="compensation_and_benefits"
        placeholder="Rate" required>

    <label><br>Cultural Values<br></label>
    <input list="rate" name="cultural_values" id="cultural_values"
           placeholder="Rate" required>

    <label><br>Diversity & Inclusion<br></label>
    <input list="rate" name="diversity_and_inclusion" id="diversity_and_inclusion"
           placeholder="Rate" required pattern="[0-5]{1}">

    <label><br>Senior leadership<br></label>
    <input list="rate" name="senior_leadership" id="senior_leadership"
           placeholder="Rate" required>

    <label><br>Work-Life balance<br></label>
    <input list="rate" name="work_life_balance" id="work_life_balance"
           placeholder="Rate" required>

    <label><br>Overall Rating<br></label>
    <input list="rate" name="overall_rating" id="overall_rating"
           placeholder="Rate" required>

    <label><br>Recommend to a friend? (Y-N)<br></label>
    <select id="recommended_to_friend" name="recommended_to_friend">
        <option value="POSITIVE">Yes</option>
        <option value="NEGATIVE">No</option>
    </select>

    <label><br>Advice:<br></label>
    <textarea id="advice" name="advice" rows="4" cols="50" placeholder="Write your advice here...">
    </textarea>

    <label><br>Pros:<br></label>
    <textarea id="pros" name="pros" rows="4" cols="50" placeholder="Pros of working at this company...">
    </textarea>

    <label><br>Cons:<br></label>
    <textarea id="cons" name="cons" rows="4" cols="50" placeholder="Cons of working at this company...">
    </textarea>

    <label><br>Summary:<br></label>
    <textarea id="summary" name="summary" rows="4" cols="50" placeholder="To sum up, my opinion is...">
    </textarea>

    <datalist id="rate">
        <option value="0">
        <option value="1">
        <option value="2">
        <option value="3">
        <option value="4">
        <option value="5">
    </datalist>
    <button type="submit"> Submit Review </button>
</form>

<p></p>




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

