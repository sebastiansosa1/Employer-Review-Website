# INFO263-Assignment1

The core task is to develop a website for collecting reviews and displaying review information. This task will require a bit of front-end work for designing HTML pages with forms and back-end functionality written in PHP code; and then, to give the website a realistic feel you'll need to add some interactivity with JavaScript and CSS. 

There is a lot of freedom as to how you may approach this task. At the very minimum your solution must include these basic features/properties:
1. The start/home/index page for your solution, providing the used and search engine robots/crawlers with the basic information about your site. This page should also include the navigation options for accessing the rest of the pages in your solution.
2. The overview page to display the aggregate ratings/values from the reviewedEmployer_S view.
3. The functionality (pages, PHP code, SQL queries) for submitting a review for one of the listed employers. Please note that due to the number of listed employers (18,259!) you'll have to think of some smarter option for selecting an employer to be reviewed in any given instance. The fields to be include in the reviews (and in the HTML/PHP form) are to be based on the table containing the reviews.
4. The SEO features/steps required for improving the ranking of your page on Google.
5. The appearance and interactivity (the look and feel) of the website must use appropriate layout, graphics, and interaction flow. You may use suitable JavaScript/CSS libraries/frameworks to style and enhance your solution.


For the advanced features you may choose to implement some or all of the following:
1. Implementing login pages, and the features for creating user profiles/user registration, with appropriate features. This should use appropriate security precautions and avoid storing plain-text passwords in the database.
2. Implementing page(s) with graphs to display statistics for individual employers based on the reviews. To see some examples of basic visualisations explore the Glassdoor.com website. Needless to say, it recommended that you use a JavaScript library for including/rendering graphs in your solution; for example, Chart.js (https://www.chartjs.org/) is a good choice for this project, but you may choose some other suitable library, or even write your own. Here's a page how to include Chart.js it in your project (https://dyclassroom.com/chartjs/chartjs-how-to-draw-bar-graph-using-data-from-mysql-table-and-php).
3. Implementing page(s) with overall time trends for the listed employers. This task will require some clever SQL queries to generate data (based on reviews for a given employer) to display temporal trends in charts/graphs. Again, you may want to explore how these features are implemented on Glassdoor.com.

You solution must be accompanied by a four-to-five page documentation/report presenting/describing the details of your solution. This documentation is essential to guide those who will be marking your solution — please include the information to help the marker gain a clear understanding of your project solution.


-- Update git state
git remote checkout

-- Check out new branch
git checkout <branch_name>

-- Create new branch
git checkout -b <branch_name>

1. -- Switch branch
git switch <branch_name>

2. -- Check git status
git status

3. -- Add file to be commited
git add <file_name>

4. -- Commit with message
git commit -m "<your_message>"

5. git push