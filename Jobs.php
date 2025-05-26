<?php
// Database connection
require_once("settings.php");

$sql = "SELECT job_ref, job_title, salary, description, responsibilities, skills FROM jobs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Samuel Macciocca">
    <meta name="description" content="Explore job opportunities for Fullstack Web Developers and Data Scientists. Find your next career move here.">
    <meta name="keywords" content="Jobs, Fullstack Developer, Data Scientist, Web Development, Careers">
    <title>Jobs Page | Career Opportunities</title>
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