<<<<<<< HEAD
<!--
    This is a simple HTML page for a job listing.
    It includes a title, navigation, job descriptions, and a footer.
-->
<?php $page_title = 'LSCL Jobs Page'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta information for the page -->
=======
<?php
// Database connection
require_once("settings.php");

$sql = "SELECT job_ref, job_title, salary, description, responsibilities, skills FROM jobs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
>>>>>>> origin/project_part2
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Samuel Macciocca">
    <meta name="description" content="Explore job opportunities for Fullstack Web Developers and Data Scientists. Find your next career move here.">
    <meta name="keywords" content="Jobs, Fullstack Developer, Data Scientist, Web Development, Careers">
    <title>Jobs Page | Career Opportunities</title>
<<<<<<< HEAD
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Header section with navigation -->
    <?php include 'header.inc'; ?>

    <!-- Main content area -->
    <main>
        <!-- Section for Fullstack Web Developer job -->
        <section>
            <h2>Job Role: Fullstack Web Developer</h2>
            <p><strong>Reference Number:</strong> FSD123</p>
            <p><strong>Title:</strong> Fullstack Web Developer</p>
            <p><strong>Salary:</strong>  $80,000 - $110,000 per year</p>
            <p><strong>Description:</strong> Responsible for both front-end and back-end development, ensuring seamless integration of web applications.</p>
            <p><strong>Supervisor:</strong> John Doe</p>
            <h3>Responsibilities:</h3>
            <!-- Ordered list of responsibilities -->
            <ol>
                <li>Develop and maintain web applications.</li>
                <li>Collaborate with designers and other developers.</li>
                <li>Optimize applications for maximum speed and scalability.</li>
                <li>Lead and mentor junior developers.</li>
                <li>Ensure the technical feasibility of UI/UX designs.</li>
            </ol>
            <h3>Skills:</h3>
            <!-- Unordered list of skills -->
            <ul>
                <li>Proficiency in HTML, CSS, JavaScript, and server-side programming.</li>
                <li>Experience with responsive design and cross-browser compatibility.</li>
                <li>Familiarity with version control systems (e.g., Git).</li>
                <li>Strong problem-solving and leadership skills.</li>
            </ul>
        </section>

        <!-- Section for Data Scientist job -->
        <section>
            <h2>Job Role: Data Scientist</h2>
            <p><strong>Reference Number:</strong> DS456</p>
            <p><strong>Title:</strong> Data Scientist</p>
            <p><strong>Salary:</strong> $90,000 - $120,000 per year</p>
            <p><strong>Description:</strong> Analyze large datasets to extract insights and develop machine learning models.</p>
            <p><strong>Supervisor:</strong> Jane Smith</p>
            <h3>Responsibilities:</h3>
            <!-- Ordered list of responsibilities -->
            <ol>
                <li>Analyze and interpret complex data sets.</li>
                <li>Develop predictive models and algorithms.</li>
                <li>Collaborate with cross-functional teams to meet business goals.</li>
                <li>Communicate findings to stakeholders.</li>
                <li>Stay up-to-date with the latest data science trends and technologies.</li>
            </ol>
            <h3>Skills:</h3>
            <!-- Unordered list of skills -->
            <ul>
                <li>Proficiency in Python or R.</li>
                <li>Experience with machine learning frameworks.</li>
                <li>Strong communication and problem-solving skills.</li>
                <li>Familiarity with data visualization tools (e.g., Tableau, Power BI).</li>
            </ul>
        </section>
    </main>

    <!-- Footer section -->
    <footer>
        <p>&copy; 2025 Jobs Page. All rights reserved.</p>
    </footer>
</body>
<?php include 'footer.inc'; ?>

</html>
=======
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include 'header.inc'; ?>

    <main>
        <?php while($row = $result->fetch_assoc()): ?>
        <section>
            <h2>Job Role: <?= htmlspecialchars($row['job_title']) ?></h2>
            
            <p><strong>Reference Number:</strong> <?= htmlspecialchars($row['job_ref']) ?></p>
            
            <p><strong>Title:</strong> <?= htmlspecialchars($row['job_title']) ?></p>
            
            <p><strong>Salary:</strong> <?= htmlspecialchars($row['salary']) ?></p>
            
            <p><strong>Description:</strong> <?= htmlspecialchars($row['description']) ?></p>
            
            <h3>Responsibilities:</h3>
            
            <ol>
                <?php foreach(explode("\n", $row['responsibilities']) as $resp): ?>
                    <li><?= htmlspecialchars(trim($resp)) ?></li>
                <?php endforeach; ?>
            </ol>
           
            <h3>Skills:</h3>
            
            <ul>
                <?php foreach(explode("\n", $row['skills']) as $skill): ?>
                    <li><?= htmlspecialchars(trim($skill)) ?></li>
                <?php endforeach; ?>
            </ul>
        
        </section>
        
        <?php endwhile; ?>
   
    </main>

<?php include 'footer.inc'; ?>

    <!-- Apply Form -->
    <form action="apply.php" method="post">
        <label for="job_ref">Select a job to apply for:</label>
        <select name="job_ref" id="job_ref">
            <?php
            // Reset pointer to fetch again for dropdown
            $result2 = $conn->query($sql);
            while($row2 = $result2->fetch_assoc()):
            ?>
                <option value="<?= $row2['job_ref'] ?>">
                    <?= htmlspecialchars($row2['job_title']) ?> - <?= htmlspecialchars($row2['job_ref']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Apply">
    </form>
</body>
</html>
<?php $conn->close(); 

?>
>>>>>>> origin/project_part2
