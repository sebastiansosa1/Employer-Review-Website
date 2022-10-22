<?php

class Review
{
    protected $reviewId = 0;
    protected $employerId = 0;
    protected $reviewDateTime = "";
    protected $advice = "";
    protected $cons = "";
    protected $employmentStatus = "";
    protected $isCurrentJob = "";
    protected $jobEndingYear = "";
    protected $jobTitle = "";
    protected $lengthOfEmployment = "";
    protected $pros = "";
    protected $ratingBusinessOutlook = "";
    protected $ratingCareerOpportunities = "";
    protected $ratingCeo = "";
    protected $ratingCompensationAndBenefits = "";
    protected $ratingCultureAndValues = "";
    protected $ratingDiversityAndInclusion = "";
    protected $ratingOverall = "";
    protected $ratingRecommendToFriend = "";
    protected $ratingSeniorLeadership = "";
    protected $ratingWorkLifeBalance = "";
    protected $summary = "";

    public function __construct($reviewId, $employerId, $reviewDateTime, $advice, $cons,
                                $employmentStatus, $isCurrentJob, $jobEndingYear, $jobTitle, $lengthOfEmployment, $pros,
                                $ratingBusinessOutlook, $ratingCareerOpportunities, $ratingCeo, $ratingCompensationAndBenefits,
                                $ratingCultureAndValues, $ratingDiversityAndInclusion, $ratingOverall, $ratingRecommendToFriend,
                                $ratingSeniorLeadership, $ratingWorkLifeBalance, $summary)
    {
        $this->reviewId = $reviewId;
        $this->employerId = $employerId;
        $this->reviewDateTime = $reviewDateTime;
        $this->advice = $advice;
        $this->cons = $cons;
        $this->employmentStatus = $employmentStatus;
        $this->isCurrentJob = $isCurrentJob;
        $this->jobEndingYear = $jobEndingYear;
        $this->jobTitle = $jobTitle;
        $this->lengthOfEmployment = $lengthOfEmployment;
        $this->pros = $pros;
        $this->ratingBusinessOutlook = $ratingBusinessOutlook;
        $this->ratingCareerOpportunities = $ratingCareerOpportunities;
        $this->ratingCeo = $ratingCeo;
        $this->ratingCompensationAndBenefits = $ratingCompensationAndBenefits;
        $this->ratingCultureAndValues = $ratingCultureAndValues;
        $this->ratingDiversityAndInclusion = $ratingDiversityAndInclusion;
        $this->ratingOverall = $ratingOverall;
        $this->ratingRecommendToFriend = $ratingRecommendToFriend;
        $this->ratingSeniorLeadership = $ratingSeniorLeadership;
        $this->ratingWorkLifeBalance = $ratingWorkLifeBalance;
        $this->summary = $summary;
    }
    // GETS
    public function getReviewId()
    {
        return $this->reviewId;
    }

    public function getEmployerId()
    {
        return $this->employerId;
    }

    public function getReviewDateTime()
    {
        return $this->reviewDateTime;
    }

    public function getAdvice()
    {
        return $this->advice;
    }

    public function getCons()
    {
        return $this->cons;
    }

    public function getEmploymentStatus()
    {
        return $this->employmentStatus;
    }

    public function getIsCurrentJob()
    {
        return $this->isCurrentJob;
    }

    public function getJobEndingYear()
    {
        return $this->jobEndingYear;
    }

    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    public function getLengthOfEmployment()
    {
        return $this->lengthOfEmployment;
    }

    public function getPros()
    {
        return $this->pros;
    }

    public function getRatingBusinessOutlook()
    {
        return $this->ratingBusinessOutlook;
    }
    public function getRatingCareerOpportunities()
    {
        return $this->ratingCareerOpportunities;
    }

    public function getRatingCeo()
    {
        return $this->ratingCeo;
    }

    public function getRatingCompensationAndBenefits()
    {
        return $this->ratingCompensationAndBenefits;
    }

    public function getRatingCultureAndValues()
    {
        return $this->ratingCultureAndValues;
    }

    public function getRatingDiversityAndInclusion()
    {
        return $this->ratingDiversityAndInclusion;
    }

    public function getRatingOverall()
    {
        return $this->ratingOverall;
    }

    public function getRatingRecommendToFriend()
    {
        return $this->ratingRecommendToFriend;
    }

    public function getRatingSeniorLeadership()
    {
        return $this->ratingSeniorLeadership;
    }

    public function getRatingWorkLifeBalance()
    {
        return $this->ratingWorkLifeBalance;
    }

    public function getSummary()
    {
        return $this->summary;
    }
    // SETS
    public function setReviewId($param)
    {
        $this->reviewId = $param;
    }

    public function setEmployerId($param)
    {
        $this->employerId = $param;
    }

    public function setReviewDateTime($param)
    {
        $this->reviewDateTime = $param;
    }

    public function setAdvice($param)
    {
        $this->advice = $param;
    }

    public function setCons($param)
    {
        $this->cons = $param;
    }

    public function setEmploymentStatus($param)
    {
        $this->employmentStatus = $param;
    }

    public function setIsCurrentJob($param)
    {
        $this->isCurrentJob = $param;
    }

    public function setJobEndingYear($param)
    {
        $this->jobEndingYear = $param;
    }

    public function setJobTitle($param)
    {
        $this->jobTitle = $param;
    }

    public function setLengthOfEmployment($param)
    {
        $this->lengthOfEmployment = $param;
    }

    public function setPros($param)
    {
        $this->pros = $param;
    }

    public function setRatingBusinessOutlook($param)
    {
        $this->ratingBusinessOutlook = $param;
    }
    public function setRatingCareerOpportunities($param)
    {
        $this->ratingCareerOpportunities = $param;
    }

    public function setRatingCeo($param)
    {
        $this->ratingCeo = $param;
    }

    public function setRatingCompensationAndBenefits($param)
    {
        $this->ratingCompensationAndBenefits = $param;
    }

    public function setRatingCultureAndValues($param)
    {
        $this->ratingCultureAndValues = $param;
    }

    public function setRatingDiversityAndInclusion($param)
    {
        $this->ratingDiversityAndInclusion = $param;
    }

    public function setRatingOverall($param)
    {
        $this->ratingOverall = $param;
    }

    public function setRatingRecommendToFriend($param)
    {
        $this->ratingRecommendToFriend = $param;
    }

    public function setRatingSeniorLeadership($param)
    {
        $this->ratingSeniorLeadership = $param;
    }

    public function setRatingWorkLifeBalance($param)
    {
        $this->ratingWorkLifeBalance = $param;
    }

    public function setSummary($param)
    {
        $this->summary = $param;
    }

}

?>
