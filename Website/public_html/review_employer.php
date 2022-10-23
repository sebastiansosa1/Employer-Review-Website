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
    We have a huge number of people who rate their CEOs, and OpenReview reviews provide open-ended pros and cons of working at those companies.">
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

    <div class="d-flex justify-content-center">
        <h1>Rate an employer</br></h1>
    </div>
    <div class="d-flex justify-content-center">
        <h5>Your opinion is important for the community.</h5>
    </div>

    <section class="mt-5">
        <div class="container">
            <div id="section class=container-md">

                <p>Instructions: Temporal solution for searching a company to review.<br>
                    Write in the search bar at least 3 letters
                    of the name of the company, then press the button search and the results will be options to select in the field below.</p>

            </div>

            <!--                              SEARCH COMPANY FORM                             -->
            <div class="d-flex">
                <form class="d-flex" role="search" method="GET">
                    <input class="form-control me-2" type="select_company" placeholder="Company Name" aria-label="Search"
                           name="select_company" value="<?php if(isset($_GET['select_company'])){ echo $_GET['select_company']; } ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            <!--                                SUBMIT REVIEW FORM                               -->
            <div class="d-flex justify-content-left">
                <form action="review_employer.php" method="POST" enctype="multipart/form-data">

                    <label for="employerId" class="form-label">Company to Review:</label>
                    <input class="form-control" list="companyOptions" id="employerId" name="employerId" placeholder="Type to search...">


                    <label for="jobTitle" class="form-label">Job Title: </label>
                    <input class="form-control" type="text" name="jobTitle" placeholder="Job Title" id="jobTitle" />



                    <label for="employedFrom" class="form-label">Employed From:</label>
                    <input class="form-control" type="date" name="employed_from" placeholder="Select Date" id="employedFrom" required />


                    <label for="employedTo" class="form-label">Employed Until:</label>
                    <input class="form-control" type="date" name="employed_to" placeholder="Select Date" id="employedTo" required />


                    <label for="isCurrentJob" class="form-label">Still employed?:</label>
                    <select class="form-control" id="isCurrentJob" name="isCurrentJob" required >
                        <option value="">--</option>
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>


                    <label for="ratingCeo" class="form-label">CEO:</label>
                    <select class="form-control" id="ratingCeo" name="ratingCeo" required>
                        <option value="NO_OPINION">No Opinion</option>
                        <option value="APPROVE">Approved</option>
                        <option value="DISAPPROVE">Not Approved</option>
                    </select>

                    <!--                    SPLIT FROM HERE                 -->
                    <label for="ratingCompensationAndBenefits" class="form-label">Compensation & Benefits</label>
                    <input class="form-control" list="rate" name="ratingCompensationAndBenefits" id="ratingCompensationAndBenefits"
                           placeholder="Rate" required/>

                    <label for="ratingCareerOpportunities" class="form-label">Career Opportunities</label>
                    <input class="form-control" list="rate" name="ratingCareerOpportunities" id="ratingCareerOpportunities"
                           placeholder="Rate" required/>

                    <label for="ratingBusinessOutlook" class="form-label">Business Outlook</label>
                    <input class="form-control" list="rate" name="ratingBusinessOutlook" id="ratingBusinessOutlook"
                           placeholder="Rate"/>

                    <label for="ratingCultureAndValues" class="form-label">Culture And Values</label>
                    <input class="form-control" list="rate" name="ratingCultureAndValues" id="ratingCultureAndValues"
                           placeholder="Rate" required/>


                    <label for="ratingDiversityAndInclusion" class="form-label">Diversity & Inclusion</label>
                    <input class="form-control" list="rate" name="ratingDiversityAndInclusion" id="ratingDiversityAndInclusion"
                           placeholder="Rate" required pattern="[0-5]{1}"/>


                    <label for="ratingSeniorLeadership" class="form-label">Senior Leadership</label>
                    <input class="form-control" list="rate" name="ratingSeniorLeadership" id="ratingSeniorLeadership"
                           placeholder="Rate" required/>


                    <label for="ratingWorkLifeBalance" class="form-label">Work-Life Balance</label>
                    <input class="form-control" list="rate" name="ratingWorkLifeBalance" id="ratingWorkLifeBalance"
                           placeholder="Rate" required/>


                    <label for="ratingOverall" class="form-label">Overall Rating</label>
                    <input class="form-control" list="rate" name="ratingOverall" id="ratingOverall"
                           placeholder="Rate" required>
                    <!--                    SPLIT TO HERE                 -->


                    <label for="ratingRecommendedToFriend" class="form-label">Recommend to a friend?</label>
                    <select class="form-control" id="ratingRecommendedToFriend" name="ratingRecommendedToFriend">
                        <option value="<null>">--</option>
                        <option value="POSITIVE">Yes</option>
                        <option value="NEGATIVE">No</option>
                    </select>


                    <label for="advice" class="form-label">Advice:</label>
                    <textarea class="form-control" id="advice" name="advice" rows="4" cols="50" required
                              placeholder="Write your advice here..."></textarea>


                    <label for="pros" class="form-label">Pros:</label>
                    <textarea class="form-control" id="pros" name="pros" rows="4" cols="50" required
                              placeholder="Pros of working at this company..."></textarea>



                    <label for="cons" class="form-label">Cons:</label>
                    <textarea class="form-control" id="cons" name="cons" rows="4" cols="50" required
                              placeholder="Cons of working at this company..."></textarea>



                    <label for="summary" class="form-label">Summary:</label>
                    <textarea class="form-control" id="summary" name="summary" rows="4" cols="50" required
                              placeholder="To sum up, my opinion is..."></textarea>
                    <br/>

                    <input class="form-control" type="submit" value="Submit Review" name="submitReview" id="submitReview"/>

                    <br/>

                </form>
            </div>


        </div>
    </section>

    <datalist id="rate">
        <option value="0">
        <option value="1">
        <option value="2">
        <option value="3">
        <option value="4">
        <option value="5">
    </datalist>






    <datalist id='companyOptions'>
        <?php
        $open_review_s_db = openConnection();
        if(isset($_GET['select_company']) && strlen($_GET['select_company']) > 2) {
            $filter_params = $_GET['select_company'];
            $query = "SELECT employer_id, company_name FROM employer WHERE company_name LIKE '%$filter_params%'";
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




    <?php

    if (isset($_POST['submitReview']))
    {
        debug_to_console("posted");
//            &&
//            isset($_POST['employerId']) &&
//            isset($_POST['advice']) &&
//            isset($_POST['cons']) &&
//            isset($_POST['pros']) &&
//            isset($_POST['ratingCareerOpportunities']) &&
//            isset($_POST['ratingCeo']) &&
//            isset($_POST['ratingCompensationAndBenefits']) &&
//            isset($_POST['ratingCultureAndValues']) &&
//            isset($_POST['ratingDiversityAndInclusion']) &&
//            isset($_POST['ratingOverall']) &&
//            isset($_POST['ratingRecommendToFriend']) &&
//            isset($_POST['ratingSeniorLeadership']) &&
//            isset($_POST['ratingWorkLifeBalance']) &&
//            isset($_POST['summary']))
        $review = new Review();

        if(isset($_POST['employerId'])) {
            $review->setEmployerId($_POST['employerId']);
        }
        if(isset($_POST['advice'])) {
            $review->setAdvice($_POST['advice']);
        }
        if(isset($_POST['cons'])) {
            $review->setCons($_POST['cons']);
        }
        if(isset($_POST['pros'])) {
            $review->setPros($_POST['pros']);
        }
        if(isset($_POST['ratingCareerOpportunities'])) {
            $review->setRatingCareerOpportunities($_POST['ratingCareerOpportunities']);
        }
        if(isset($_POST['ratingCeo'])) {
            $review->setRatingCeo($_POST['ratingCeo']);
        }
        if(isset($_POST['ratingCompensationAndBenefits'])) {
            $review->setRatingCompensationAndBenefits($_POST['ratingCompensationAndBenefits']);
        }
        if(isset($_POST['ratingCultureAndValues'])) {
            $review->setRatingCultureAndValues($_POST['ratingCultureAndValues']);
        }
        if(isset($_POST['ratingDiversityAndInclusion'])) {
            $review->setRatingDiversityAndInclusion($_POST['ratingDiversityAndInclusion']);
        }
        if(isset($_POST['ratingOverall'])) {
            $review->setRatingOverall($_POST['ratingOverall']);
        }
        if(isset($_POST['ratingRecommendToFriend'])) {
            $review->setRatingRecommendToFriend($_POST['ratingRecommendToFriend']);
        }
        if(isset($_POST['ratingSeniorLeadership'])) {
            $review->setRatingSeniorLeadership($_POST['ratingSeniorLeadership']);
        }
        if(isset($_POST['ratingWorkLifeBalance'])) {
            $review->setRatingWorkLifeBalance($_POST['ratingWorkLifeBalance']);
        }
        if(isset($_POST['summary'])) {
            $review->setSummary($_POST['summary']);
        }

        $timeStamp = (new DateTime())->format('Y-m-d H:i:s');
        $review->setReviewDateTime($timeStamp);

        if(isset($_POST['employed_to'])) {
            $review->setJobEndingYear(date_parse($_POST['employed_to'])["year"]);
        }
        if(isset($_POST['employed_to']) && isset($_POST['employed_from'])) {
            $review->setLengthOfEmployment(date_parse($_POST['employed_to'])["year"] -
                date_parse($_POST['employed_from'])["year"]);
        }
        if(isset($_POST['employerId'])) {
            $review->setEmploymentStatus($_POST['employerId']);
        }
        if(isset($_POST['advice'])) {
            $review->setIsCurrentJob($_POST['advice']);
        }
        if(isset($_POST['cons'])) {
            $review->setJobTitle($_POST['cons']);
        }
        if(isset($_POST['pros'])) {
            $review->setRatingBusinessOutlook($_POST['pros']);
        }
//            $employerId = $_POST['employerId'];
//            $advice = $_POST['advice'];
//            $cons = $_POST['cons'];
//            $pros = $_POST['pros'];
//            $ratingCareerOpportunities = $_POST['ratingCareerOpportunities'];
//            $ratingCeo = $_POST['ratingCeo'];
//            $ratingCompensationAndBenefits = $_POST['ratingCompensationAndBenefits'];
//            $ratingCultureAndValues = $_POST['ratingCultureAndValues'];
//            $ratingDiversityAndInclusion = $_POST['ratingDiversityAndInclusion'];
//            $ratingOverall = $_POST['ratingOverall'];
//            $ratingRecommendToFriend = $_POST['ratingRecommendToFriend'];
//            $ratingSeniorLeadership = $_POST['ratingSeniorLeadership'];
//            $ratingWorkLifeBalance = $_POST['ratingWorkLifeBalance'];
//            $summary = $_POST['summary'];
//            $reviewDateTime = (new DateTime())->format('Y-m-d H:i:s');
//            $jobEndingYear = date_parse($_POST['employed_to'])["year"];
//            $lengthOfEmployment = date_parse($_POST['employed_to'])["year"] - date_parse($_POST['employed_from'])["year"];
//            $employmentStatus = $_POST['employmentStatus'];
//            $isCurrentJob = $_POST['isCurrentJob'];
//            $jobTitle = $_POST['jobTitle'];
//            $ratingBusinessOutlook = $_POST['ratingBusinessOutlook'];

//            $review = new Review($employerId, $reviewDateTime,$advice, $cons,
//                $employmentStatus, $isCurrentJob, $jobEndingYear, $jobTitle, $lengthOfEmployment, $pros,
//                $ratingBusinessOutlook, $ratingCareerOpportunities, $ratingCeo, $ratingCompensationAndBenefits,
//                $ratingCultureAndValues, $ratingDiversityAndInclusion, $ratingOverall, $ratingRecommendToFriend,
//                $ratingSeniorLeadership, $ratingWorkLifeBalance, $summary);

        debug_to_console($review);
        insertReview($review);
    }

    ?>
</main>

<div id="footer"></div>
</body>
</html>

