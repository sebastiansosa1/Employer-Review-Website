<?php

class Employer
{
    protected $employerId = 0;
    protected $companyName = "";
    protected $companyHq = "";
    protected $companyUrl = "";

    public function __construct($employerId, $companyName, $companyHq, $companyUrl)
    {
        $this->employerId = $employerId;
        $this->companyName = $companyName;
        $this->companyHq = $companyHq;
        $this->companyUrl = $companyUrl;
    }

    public function getEmployerId()
    {
        return $this->employerId;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function getCompanyHq()
    {
        return $this->companyHq;
    }

    public function getCompanyUrl()
    {
        return $this->companyUrl;
    }

}

?>
