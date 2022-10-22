<?php
//required_once 'Review.php';
//required_once 'Employer.php';

/**
 * Create connection to the database
 *
 * @return PDO object which is the connection to the database
 */
function openConnection()
{
    try {
        $open_review_s_db = new PDO("sqlite:open_review_s_sqlite.db");
        $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $open_review_s_db;
}



/**
 * Inserts a new review into the employerReview_S table.
 *
 * @param Review The item that will be added
 */
function insertReview($review)
{
    require 'Review.php';

//        $reviewId = $review->getReviewId();
    $employerId = $review->getEmployerId();
    $reviewDateTime = $review->getReviewDateTime();
    $advice = $review->getAdvice();
    $cons = $review->getCons();
    $employmentStatus = $review->getEmploymentStatus();
    $isCurrentJob = $review->getIsCurrentJob();
    $jobEndingYear = $review->getJobEndingYear();
    $jobTitle = $review->getJobTitle();
    $lengthOfEmployment = $review->getLengthOfEmployment();
    $pros = $review->getPros();
    $ratingBusinessOutlook = $review->getRatingBusinessOutlook();
    $ratingCareerOpportunities = $review->getRatingCareerOpportunities();
    $ratingCeo = $review->getRatingCeo();
    $ratingCompensationAndBenefits = $review->getRatingCompensationAndBenefits();
    $ratingCultureAndValues = $review->getRatingCultureAndValues();
    $ratingDiversityAndInclusion = $review->getRatingDiversityAndInclusion();
    $ratingOverall = $review->getRatingOverall();
    $ratingRecommendToFriend = $review->getRatingRecommendToFriend();
    $ratingSeniorLeadership = $review->getRatingSeniorLeadership();
    $ratingWorkLifeBalance = $review->getRatingWorkLifeBalance();
    $summary = $review->getSummary();


    // Using prepare
    $query = "INSERT INTO employerReview_S (employerId, reviewDateTime, advice, cons, 
                                  employmentStatus, isCurrentJob, jobEndingYear, jobTitle, lengthOfEmployment, pros, 
                                  ratingBusinessOutlook, ratingCareerOpportunities, ratingCeo, ratingCompensationAndBenefits, 
                                  ratingCultureAndValues, ratingDiversityAndInclusion, ratingOverall, ratingRecommendToFriend, 
                                  ratingSeniorLeadership, ratingWorkLifeBalance, summary) VALUES" .
        "(:employerId, :reviewDateTime, :advice, :cons, :employmentStatus, :isCurrentJob, :jobEndingYear, 
                                :jobTitle, :lengthOfEmployment, :pros, :ratingBusinessOutlook, :ratingCareerOpportunities, 
                                :ratingCeo, :ratingCompensationAndBenefits, :ratingCultureAndValues, 
                                :ratingDiversityAndInclusion, :ratingOverall, :ratingRecommendToFriend, :ratingSeniorLeadership,
                                :ratingWorkLifeBalance, :summary)";
    $pdo = openConnection();

    try {
        $stmt = $pdo->prepare($query);
//            $stmt->bindParam(':reviewId', $reviewId, PDO::PARAM_INT);
        $stmt->bindParam(':employerId', $employerId, PDO::PARAM_INT);
        $stmt->bindParam(':reviewDateTime', $reviewDateTime);
        $stmt->bindParam(':advice', $advice);
        $stmt->bindParam(':cons', $cons);
        $stmt->bindParam(':employmentStatus', $employmentStatus);
        $stmt->bindParam(':isCurrentJob', $isCurrentJob, PDO::PARAM_INT);
        $stmt->bindParam(':jobEndingYear', $jobEndingYear, PDO::PARAM_INT);
        $stmt->bindParam(':jobTitle', $jobTitle);
        $stmt->bindParam(':lengthOfEmployment', $lengthOfEmployment, PDO::PARAM_INT);
        $stmt->bindParam(':pros', $pros);
        $stmt->bindParam(':ratingBusinessOutlook', $ratingBusinessOutlook);
        $stmt->bindParam(':ratingCareerOpportunities', $ratingCareerOpportunities, PDO::PARAM_INT);
        $stmt->bindParam(':ratingCeo', $ratingCeo);
        $stmt->bindParam(':ratingCompensationAndBenefits', $ratingCompensationAndBenefits, PDO::PARAM_INT);
        $stmt->bindParam(':ratingCultureAndValues', $ratingCultureAndValues, PDO::PARAM_INT);
        $stmt->bindParam(':ratingDiversityAndInclusion', $ratingDiversityAndInclusion, PDO::PARAM_INT);
        $stmt->bindParam(':ratingOverall', $ratingOverall, PDO::PARAM_INT);
        $stmt->bindParam(':ratingRecommendToFriend', $ratingRecommendToFriend);
        $stmt->bindParam(':ratingSeniorLeadership', $ratingSeniorLeadership, PDO::PARAM_INT);
        $stmt->bindParam(':ratingWorkLifeBalance', $ratingWorkLifeBalance, PDO::PARAM_INT);
        $stmt->bindParam(':summary', $summary);
        $stmt->execute();
    } catch (PDOException $e) {
        fatalError($e->getMessage());
    }
    $pdo = null;
}
?>


