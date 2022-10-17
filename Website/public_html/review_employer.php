<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <label>
        <br>Select a company to review:<br>
        <input type="search" name="select_company" placeholder="Company Name"
               value="<?php if(isset($_GET['select_company'])){ echo $_GET['select_company']; } ?>" >
    </label>
    <button type="submit"> Search </button>
</form>
<?php
    try {
    //    $open_review_s_db = new PDO("sqlite:open_review_s_sqlite.db");
        $open_review_s_db = new PDO("sqlite:/Applications/AMPPS/www/Assignment1/open_review_s_sqlite.db");
        $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    if(isset($_GET['select_company']) && strlen($_GET['select_company']) > 2) {
        $filter_params = $_GET['select_company'];
        $query = "SELECT employer_id, company_name
                FROM employer
                WHERE company_name LIKE '%$filter_params%'";
        try {
            $res = $open_review_s_db->query($query);
            echo "<ul>";
            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row['employer_id'] . ": " . $row['company_name'] . "</li>";
            }
            echo "</ul>";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
?>

<form action="" method="POST">
    <label>
        <br>Employer ID: (TEMP)<br>
        <input type="number" name="employerId" placeholder="Employer ID" required
               value="<?php if(isset($_POST['job_title'])){ echo $_POST['job_title']; } ?>" >
    </label>

    <label>
        <br>Job Title:<br>
        <input type="text" name="jobTitle" placeholder="Job Title"
               value="<?php if(isset($_POST['job_title'])){ echo $_POST['job_title']; } ?>" >
    </label>

    <label>
        <br>Employed From:<br>
        <input type="date" name="employed_from" placeholder="Select Date" required
               value="<?php if(isset($_POST['employed_from'])){ echo $_POST['employed_from']; } ?>" >
    </label>

    <label>
        <br>Employed To:<br>
        <input type="date" name="employed_to" placeholder="Select Date" required
               value="<?php if(isset($_POST['employed_to'])){ echo $_POST['employed_to']; } ?>" >
    </label>

    <label>
        <br>Still employed?:<br>
        <select id="" name="isCurrentJob" required>
            <option value="">--</option>
            <option value="1">YES</option>
            <option value="0">NO</option>
        </select>
    </label>

    <label>
        <br>CEO:<br>
        <select id="ratingCeo" name="CEO" required>
            <option value="APPROVE">Approved</option>
            <option value="DISAPPROVE">Not Approved</option>
            <option value="NO_OPINION">No Opinion</option>
        </select>
    </label>

    <label>
        <br>Compensation & Benefits<br>
        <input list="rate" name="ratingCompensationAndBenefits" id=""
            placeholder="Rate" required>
    </label>

    <label>
        <br>Career Opportunities<br>
        <input list="rate" name="ratingCareerOpportunities" id=""
               placeholder="Rate" required>
    </label>

    <label>
        <br>Business Outlook<br>
        <input list="rate" name="ratingBusinessOutlook" id=""
               placeholder="Rate">
    </label>

    <label>
        <br>Culture And Values<br>
        <input list="rate" name="ratingCultureAndValues" id=""
               placeholder="Rate" required>
    </label>

    <label>
        <br>Diversity & Inclusion<br>
        <input list="rate" name="ratingDiversityAndInclusion" id=""
               placeholder="Rate" required pattern="[0-5]{1}">
    </label>
    <label>
        <br>Senior Leadership<br>
    <input list="rate" name="ratingSeniorLeadership" id=""
           placeholder="Rate" required>
    </label>

    <label>
        <br>Work-Life Balance<br>
    <input list="rate" name="ratingWorkLifeBalance" id=""
           placeholder="Rate" required>
    </label>

    <label>
        <br>Overall Rating<br>
    <input list="rate" name="ratingOverall" id=""
           placeholder="Rate" required>
    </label>

    <label>
        <br>Recommend to a friend?<br>
    <select id="" name="ratingRecommendedToFriend">
        <option value="<null>">--</option>
        <option value="POSITIVE">Yes</option>
        <option value="NEGATIVE">No</option>
    </select>
    </label>

    <label>
        <br>Advice:<br>
    <textarea id="advice" name="advice" rows="4" cols="50" required placeholder="Write your advice here...">
    </textarea>
    </label>

    <label>
        <br>Pros:<br>
    <textarea id="pros" name="pros" rows="4" cols="50" required placeholder="Pros of working at this company...">
    </textarea>
    </label>

    <label>
        <br>Cons:<br>
    <textarea id="cons" name="cons" rows="4" cols="50" required placeholder="Cons of working at this company...">
    </textarea>
    </label>

    <label>
        <br>Summary:<br>
    <textarea id="summary" name="summary" rows="4" cols="50" required placeholder="To sum up, my opinion is...">
    </textarea>
    </label>

    <datalist id="rate">
        <option value="0">
        <option value="1">
        <option value="2">
        <option value="3">
        <option value="4">
        <option value="5">
    </datalist>
    <br>
    <button type="submit"> Submit Review </button>
</form>

<p></p>

<?php


//try {
//    $res = $open_review_s_db->query("SELECT company_name, overall_rating FROM reviewedEmployer_S ORDER BY overall_rating DESC;");
//    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
//        echo $row['company_name'] . " | " . $row['overall_rating'] . "\n";
//    }
//} catch (PDOException $e) {
//    die($e->getMessage());
//}
?>
</body>
</html>

