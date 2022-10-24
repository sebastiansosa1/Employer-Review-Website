<?php
require_once 'database.php';
//print_r($_POST);

$employerId = filter_input(INPUT_POST, "employerId", FILTER_VALIDATE_INT);
$jobTitle = $_POST['jobTitle'];
$employedFromYear = isset($_POST['employed_from']) ? date_parse($_POST['employed_from'])["year"] : null;
$employedToYear = isset($_POST['employed_to']) ? date_parse($_POST['employed_to'])["year"] : null;
$isCurrentJob = filter_input(INPUT_POST, "isCurrentJob", FILTER_VALIDATE_INT);;
$ratingCeo = $_POST['ratingCeo'];
$ratingCompensationAndBenefits = filter_input(INPUT_POST, "ratingCompensationAndBenefits", FILTER_VALIDATE_INT);
$ratingCareerOpportunities = filter_input(INPUT_POST, "ratingCareerOpportunities", FILTER_VALIDATE_INT);
$ratingBusinessOutlook = filter_input(INPUT_POST, "ratingBusinessOutlook", FILTER_VALIDATE_INT);
$ratingCultureAndValues = filter_input(INPUT_POST, "ratingCultureAndValues", FILTER_VALIDATE_INT);
$ratingDiversityAndInclusion = filter_input(INPUT_POST, "ratingDiversityAndInclusion", FILTER_VALIDATE_INT);
$ratingSeniorLeadership = filter_input(INPUT_POST, "ratingSeniorLeadership", FILTER_VALIDATE_INT);
$ratingWorkLifeBalance = filter_input(INPUT_POST, "ratingWorkLifeBalance", FILTER_VALIDATE_INT);
$ratingOverall = intval(ceil(($ratingCompensationAndBenefits + $ratingCareerOpportunities + $ratingBusinessOutlook
        + $ratingCultureAndValues + $ratingDiversityAndInclusion + $ratingSeniorLeadership + $ratingWorkLifeBalance) / 7));
$ratingRecommendToFriend = $_POST['ratingRecommendToFriend'];
$advice = $_POST['advice'];
$pros = $_POST['pros'];
$cons = $_POST['cons'];
$summary = $_POST['summary'];
$reviewDateTime = (new DateTime())->format('Y-m-d H:i:s');
$jobEndingYear = date_parse($_POST['employed_to'])["year"];
$lengthOfEmployment = date_parse($_POST['employed_to'])["year"] - date_parse($_POST['employed_from'])["year"];
$employmentStatus = $_POST['employmentStatus'];




$pdo = openConnection();

$jobTitle = $pdo->quote($jobTitle);
$ratingCeo = $pdo->quote($ratingCeo);
$ratingRecommendToFriend = $pdo->quote($ratingRecommendToFriend);
$advice = $pdo->quote($advice);
$pros = $pdo->quote($pros);
$cons = $pdo->quote($cons);
$summary = $pdo->quote($summary);
$reviewDateTime = $pdo->quote($reviewDateTime);
$employmentStatus = $pdo->quote($employmentStatus);

//var_dump($employerId,
//    $jobTitle,
//    $employedFromYear, //
//    $employedToYear, //
//    $isCurrentJob,
//    $ratingCeo,
//    $ratingCompensationAndBenefits,
//    $ratingCareerOpportunities,
//    $ratingBusinessOutlook,
//    $ratingCultureAndValues,
//    $ratingDiversityAndInclusion,
//    $ratingSeniorLeadership,
//    $ratingWorkLifeBalance,
//    $ratingOverall,
//    $ratingRecommendToFriend, //
//    $advice,
//    $pros,
//    $cons,
//    $summary,
//    $reviewDateTime,
//    $jobEndingYear,
//    $lengthOfEmployment,
//    $employmentStatus);

$query = "INSERT INTO employerReview_S (employerId, reviewDateTime, advice, cons, isCurrentJob, jobEndingYear, jobTitle, lengthOfEmployment, pros, 
                                  ratingBusinessOutlook, ratingCareerOpportunities, ratingCeo, ratingCompensationAndBenefits, 
                                  ratingCultureAndValues, ratingDiversityAndInclusion, ratingOverall, ratingRecommendToFriend, 
                                  ratingSeniorLeadership, ratingWorkLifeBalance, summary, employmentStatus) VALUES (
                                 $employerId, $reviewDateTime, $advice, $cons, $isCurrentJob, $jobEndingYear, $jobTitle, 
                                $lengthOfEmployment, $pros, $ratingBusinessOutlook, $ratingCareerOpportunities, $ratingCeo, 
                                $ratingCompensationAndBenefits, $ratingCultureAndValues, $ratingDiversityAndInclusion, 
                                $ratingOverall, $ratingRecommendToFriend, 
                                  $ratingSeniorLeadership, $ratingWorkLifeBalance, $summary, $employmentStatus)";
//print_r("\nQUERY GENERATED:");
//var_dump($query);

try {
    $result = $pdo->query($query);
    print_r("\nREVIEW SUCCESSFULLY SUBMITTED.");
    print_r("\n<a href='index.html'>Go Back to Home</a>");
} catch (PDOException $e) {
//    print_r("\nERROR CATCH:");
    var_dump($e);
    fatalError($e->getMessage());
}
$pdo = null;
//print_r($_POST);

//    "(:employerId, :reviewDateTime, :advice, :cons, :isCurrentJob, :jobEndingYear,
//                            :jobTitle, :lengthOfEmployment, :pros, :ratingBusinessOutlook, :ratingCareerOpportunities,
//                            :ratingCeo, :ratingCompensationAndBenefits, :ratingCultureAndValues,
//                            :ratingDiversityAndInclusion, :ratingOverall, :ratingRecommendToFriend, :ratingSeniorLeadership,
//                            :ratingWorkLifeBalance, :summary, :employmentStatus)";
//
//try {
//    $stmt = $pdo->prepare($query);
//    $stmt->bindParam(':employerId', $employerId, PDO::PARAM_INT);
//    $stmt->bindParam(':reviewDateTime', $reviewDateTime);
//    $stmt->bindParam(':advice', $advice);
//    $stmt->bindParam(':cons', $cons);
//    $stmt->bindParam(':isCurrentJob', $isCurrentJob, PDO::PARAM_INT);
//    $stmt->bindParam(':jobEndingYear', $jobEndingYear, PDO::PARAM_INT);
//    $stmt->bindParam(':jobTitle', $jobTitle);
//    $stmt->bindParam(':lengthOfEmployment', $lengthOfEmployment, PDO::PARAM_INT);
//    $stmt->bindParam(':pros', $pros);
//    $stmt->bindParam(':ratingBusinessOutlook', $ratingBusinessOutlook);
//    $stmt->bindParam(':ratingCareerOpportunities', $ratingCareerOpportunities, PDO::PARAM_INT);
//    $stmt->bindParam(':ratingCeo', $ratingCeo);
//    $stmt->bindParam(':ratingCompensationAndBenefits', $ratingCompensationAndBenefits, PDO::PARAM_INT);
//    $stmt->bindParam(':ratingCultureAndValues', $ratingCultureAndValues, PDO::PARAM_INT);
//    $stmt->bindParam(':ratingDiversityAndInclusion', $ratingDiversityAndInclusion, PDO::PARAM_INT);
//    $stmt->bindParam(':ratingOverall', $ratingOverall, PDO::PARAM_INT);
//    $stmt->bindParam(':ratingRecommendToFriend', $ratingRecommendToFriend);
//    $stmt->bindParam(':ratingSeniorLeadership', $ratingSeniorLeadership, PDO::PARAM_INT);
//    $stmt->bindParam(':ratingWorkLifeBalance', $ratingWorkLifeBalance, PDO::PARAM_INT);
//    $stmt->bindParam(':summary', $summary);
//    $stmt->bindParam(':employmentStatus', $employmentStatus);
//    $stmt->execute();
//} catch (PDOException $e) {
//    fatalError($e->getMessage());
//}
//
//$pdo = null;