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
<!--                    TODO: check the next line                 -->
                    <input class="form-control me-2" type="search" placeholder="Company Name" aria-label="Search"
                           name="select_company" value="<?php if(isset($_GET['select_company'])){ echo $_GET['select_company']; } ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            <div class="d-flex justify-content-center" style="width: 80%">
                <form action="process-form.php" method="POST" enctype="multipart/form-data">

                    <br>
                    <fieldset class="fieldset">
                        <legend>Details</legend>

                        <label for="employerId" class="form-label">Company to Review:</label>
                        <input class="form-control" list="companyOptions" id="employerId" name="employerId"
                               placeholder="Select or type to search...">

                        <label for="jobTitle" class="form-label">Job Title: </label>
                        <input class="form-control" type="text" name="jobTitle" placeholder="Job Title" id="jobTitle" />

                        <label for="employedFrom" class="form-label">Employed From:</label>
                        <input class="form-control" type="date" name="employed_from" placeholder="Select Date" id="employedFrom" required />

                        <label for="employedTo" class="form-label">Employed Until:</label>
                        <input class="form-control" type="date" name="employed_to" placeholder="Select Date" id="employedTo" required />

                        <label for="employmentStatus" class="form-label">Status:</label>
                        <select class="form-control" id="employmentStatus" name="employmentStatus" required >
                            <option value="">--</option>
                            <option value="REGULAR">Regular</option>
                            <option value="PART-TIME">Part-Time</option>
                        </select>

                        <label for="isCurrentJob" class="form-label">Still employed?:</label>
                        <select class="form-control" id="isCurrentJob" name="isCurrentJob" required >
                            <option value="">--</option>
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </fieldset>


                    <br>
                    <fieldset class="fieldset">
                        <legend>Ratings</legend>

                        <label for="ratingCeo" class="form-label">CEO:</label>
                        <select class="form-control" id="ratingCeo" name="ratingCeo" required>
                            <option value="NO_OPINION">No Opinion</option>
                            <option value="APPROVE">Approved</option>
                            <option value="DISAPPROVE">Not Approved</option>
                        </select>

                        <label for="ratingCompensationAndBenefits" class="form-label">Compensation & Benefits</label>
                        <input type="range" class="form-range" min="0" max="5" id="ratingCompensationAndBenefits"
                               name="ratingCompensationAndBenefits" required/>

                        <label for="ratingCareerOpportunities" class="form-label">Career Opportunities</label>
                        <input type="range" class="form-range" min="0" max="5" name="ratingCareerOpportunities"
                               id="ratingCareerOpportunities" required/>

                        <label for="ratingBusinessOutlook" class="form-label">Business Outlook</label>
                        <input type="range" class="form-range" min="0" max="5" name="ratingBusinessOutlook"
                               id="ratingBusinessOutlook" required/>

                        <label for="ratingCultureAndValues" class="form-label">Culture And Values</label>
                        <input type="range" class="form-range" min="0" max="5" name="ratingCultureAndValues"
                               id="ratingCultureAndValues" required/>

                        <label for="ratingDiversityAndInclusion" class="form-label">Diversity & Inclusion</label>
                        <input type="range" class="form-range" min="0" max="5" name="ratingDiversityAndInclusion"
                               id="ratingDiversityAndInclusion" required/>

                        <label for="ratingSeniorLeadership" class="form-label">Senior Leadership</label>
                        <input type="range" class="form-range" min="0" max="5" name="ratingSeniorLeadership"
                               id="ratingSeniorLeadership" required/>

                        <label for="ratingWorkLifeBalance" class="form-label">Work-Life Balance</label>
                        <input type="range" class="form-range" min="0" max="5" name="ratingWorkLifeBalance"
                               id="ratingWorkLifeBalance" required/>
                    </fieldset>

                    <br>
                    <fieldset class="fieldset">
                        <legend>Comments:</legend>
                        <label for="ratingRecommendToFriend" class="form-label">Recommend to a friend?</label>
                        <select class="form-control" id="ratingRecommendToFriend" name="ratingRecommendToFriend">
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
                    </fieldset>

                    <br/>
                    <fieldset class="fieldset">
                        <input class="form-control" type="submit" name="submitReview" id="submitReview"/>
                    </fieldset>


                    <br/>

                </form>
            </div>


        </div>
    </section>


    <?php
    if(isset($_GET['select_company']) && strlen($_GET['select_company']) > 2) {
        $id = 'companyOptions';
        buildOptionsList($id, $_GET['select_company']);
    }
    ?>

</main>

<div id="footer"></div>
</body>
</html>

