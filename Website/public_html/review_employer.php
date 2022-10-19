<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FakeName.com - Review Employer</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="employer_rankings.php">Employer Rankings</a></li>
        <li><a href="review_employer.php">Review an Employer</a></li>
    </ul>
</nav>
<!--TODO: Please add style to this boring form-->
<!--TODO: I'm about to finish the implementation for this page. ( To add a new review in the DB )-->
<h1>Rate an employer</h1>
<form action="" method="GET">
    <label for="select_company"></label>
        <br>Search a company to review:<br>
        <input type="search" name="select_company" placeholder="Company Name" id="select_company"
               value="<?php if(isset($_GET['select_company'])){ echo $_GET['select_company']; } ?>" >
    <button type="submit"> Search </button>

<!--    <label for="select_company" class="form-label">Company to Review:</label>-->
<!--    <input class="form-control" list="companyOptions" id="select_company" placeholder="Type to search..."-->
<!--    value="--><?php //if(isset($_GET['select_company'])){ echo $_GET['select_company']; } ?><!--">-->
<!--    <button type="submit"> Search </button>-->


    <datalist id='companyOptions'>
        <?php
        $open_review_s_db = openConnection();
        if(isset($_GET['select_company']) && strlen($_GET['select_company']) > 2) {
            $filter_params = $_GET['select_company'];
            $query = "SELECT employer_id, company_name
                FROM employer
                WHERE company_name LIKE '%$filter_params%'";
            try {
                $res = $open_review_s_db->query($query);
                echo "";
                while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=" . $row['employer_id'] . ">". $row['company_name'] . "</option> ";
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        ?>
    </datalist>

</form>
<!-- SEARCH BAR IMPLEMENTATION -->

<form action="review_employer.php" method="POST">

    <!--TODO: Modify the datalist below with react-->

    <label for="employerId" class="">Select company to Review:</label>
    <input class="" list="companyOptions" id="employerId" placeholder="Type to search...">


    <label for="jobTitle"><br>Job Title: </label>
        <input type="text" name="jobTitle" placeholder="Job Title" id="jobTitle"
               value="<?php if(isset($_POST['jobTitle'])){ echo $_POST['jobTitle']; } ?>" />


    <label for="employedFrom"><br>Employed From:</label>
        <input type="date" name="employed_from" placeholder="Select Date" id="employedFrom" required
               value="<?php if(isset($_POST['employed_from'])){ echo $_POST['employed_from']; } ?>" />


    <label for="employedTo"><br>Employed Until:</label>
        <input type="date" name="employed_to" placeholder="Select Date" id="employedTo" required
               value="<?php if(isset($_POST['employed_to'])){ echo $_POST['employed_to']; } ?>" />


    <label for="isCurrentJob"><br>Still employed?:</label>
        <select id="isCurrentJob" name="isCurrentJob" required>
            <option value="">--</option>
            <option value="1">YES</option>
            <option value="0">NO</option>
        </select>


    <label for="ratingCeo"><br>CEO:</label>
        <select id="ratingCeo" name="ratingCeo" required>
            <option value="NO_OPINION">No Opinion</option>
            <option value="APPROVE">Approved</option>
            <option value="DISAPPROVE">Not Approved</option>
        </select>

    <label for="ratingCompensationAndBenefits"><br>Compensation & Benefits</label>
        <input list="rate" name="ratingCompensationAndBenefits" id="ratingCompensationAndBenefits"
            placeholder="Rate" required/>

    <label for="ratingCareerOpportunities"><br>Career Opportunities</label>
        <input list="rate" name="ratingCareerOpportunities" id="ratingCareerOpportunities"
               placeholder="Rate" required/>

    <label for="ratingBusinessOutlook"><br>Business Outlook</label>
        <input list="rate" name="ratingBusinessOutlook" id="ratingBusinessOutlook"
               placeholder="Rate"/>

    <label for="ratingCultureAndValues"><br>Culture And Values</label>
        <input list="rate" name="ratingCultureAndValues" id="ratingCultureAndValues"
               placeholder="Rate" required/>


    <label for="ratingDiversityAndInclusion"><br>Diversity & Inclusion<label>
        <input list="rate" name="ratingDiversityAndInclusion" id="ratingDiversityAndInclusion"
               placeholder="Rate" required pattern="[0-5]{1}"/>


    <label for="ratingSeniorLeadership"><br>Senior Leadership</label>
    <input list="rate" name="ratingSeniorLeadership" id="ratingSeniorLeadership"
           placeholder="Rate" required/>


    <label for="ratingWorkLifeBalance"><br>Work-Life Balance</label>
    <input list="rate" name="ratingWorkLifeBalance" id="ratingWorkLifeBalance"
           placeholder="Rate" required/>


    <label for="ratingOverall"><br>Overall Rating</label>
    <input list="rate" name="ratingOverall" id="ratingOverall"
           placeholder="Rate" required>


    <label for="ratingRecommendedToFriend"><br>Recommend to a friend?</label>
    <select id="ratingRecommendedToFriend" name="ratingRecommendedToFriend">
        <option value="<null>">--</option>
        <option value="POSITIVE">Yes</option>
        <option value="NEGATIVE">No</option>
    </select>


    <label for="advice"><br>Advice:<br></label>
    <textarea id="advice" name="advice" rows="4" cols="50" required placeholder="Write your advice here...">
    </textarea>


    <label for="pros"><br>Pros:<br></label>
    <textarea id="pros" name="pros" rows="4" cols="50" required placeholder="Pros of working at this company...">
    </textarea>


    <label for="cons"><br>Cons:<br></label>
    <textarea id="cons" name="cons" rows="4" cols="50" required placeholder="Cons of working at this company...">
    </textarea>


    <label for="summary"><br>Summary:<br></label>
    <textarea id="summary" name="summary" rows="4" cols="50" required placeholder="To sum up, my opinion is...">
    </textarea>


    <datalist id="rate">
        <option value="0">
        <option value="1">
        <option value="2">
        <option value="3">
        <option value="4">
        <option value="5">
    </datalist>
    <br>

    <button type="submit" value="" name=""> Submit Review </button>
</form>

<p></p>

<?php

    if (isset($_POST['employerId']) &&
        isset($_POST['advice']) &&
        isset($_POST['cons']) &&
        isset($_POST['pros']) &&
        isset($_POST['ratingCareerOpportunities']) &&
        isset($_POST['ratingCeo']) &&
        isset($_POST['ratingCompensationAndBenefits']) &&
        isset($_POST['ratingCultureAndValues']) &&
        isset($_POST['ratingDiversityAndInclusion']) &&
        isset($_POST['ratingOverall']) &&
        isset($_POST['ratingRecommendToFriend']) &&
        isset($_POST['ratingSeniorLeadership']) &&
        isset($_POST['ratingWorkLifeBalance']) &&
        isset($_POST['summary'])) { //Check for the mandatory values:
        $employerId = $_POST['employerId'];
        $advice = $_POST['advice'];
        $cons = $_POST['cons'];
        $pros = $_POST['pros'];
        $ratingCareerOpportunities = $_POST['ratingCareerOpportunities'];
        $ratingCeo = $_POST['ratingCeo'];
        $ratingCompensationAndBenefits = $_POST['ratingCompensationAndBenefits'];
        $ratingCultureAndValues = $_POST['ratingCultureAndValues'];
        $ratingDiversityAndInclusion = $_POST['ratingDiversityAndInclusion'];
        $ratingOverall = $_POST['ratingOverall'];
        $ratingRecommendToFriend = $_POST['ratingRecommendToFriend'];
        $ratingSeniorLeadership = $_POST['ratingSeniorLeadership'];
        $ratingWorkLifeBalance = $_POST['ratingWorkLifeBalance'];
        $summary = $_POST['summary'];
        $reviewDateTime = date('Y-m-d H:i:s');
        $jobEndingYear = date_parse($_POST['employed_to'])["year"];
        $lengthOfEmployment = date_parse($_POST['employed_to'])["year"] - date_parse($_POST['employed_from'])["year"];
        $employmentStatus = $_POST['employmentStatus'];
        $isCurrentJob = $_POST['isCurrentJob'];
        $jobTitle = $_POST['jobTitle'];
        $ratingBusinessOutlook = $_POST['ratingBusinessOutlook'];

        $review = new Review(0, $employerId, $reviewDateTime,$advice, $cons,
            $employmentStatus, $isCurrentJob, $jobEndingYear, $jobTitle, $lengthOfEmployment, $pros,
            $ratingBusinessOutlook, $ratingCareerOpportunities, $ratingCeo, $ratingCompensationAndBenefits,
            $ratingCultureAndValues, $ratingDiversityAndInclusion, $ratingOverall, $ratingRecommendToFriend,
            $ratingSeniorLeadership, $ratingWorkLifeBalance, $summary);

        insertReview($review);
    }






?>
</body>
</html>

