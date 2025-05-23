<!DOCTYPE html>
<html>
<head>
  <title>EOI_Search</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sebastian Mills">
        <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include 'header.inc'; ?>
    <form method="GET" >
        <label>Display all EOI</label>
        <input type="submit" name="Display_all"value="Display">
    </form>
    <form method="GET" >
        <label>Search EOI by job number:</label>
        <input type="text" name="job_number" required>
        <input type="submit" value="Search">
    </form>
    <form method="GET" >
        <label>Search Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Search">
    </form>
    <?php include 'footer.inc'; ?> 
</body>
</html>

<?php
require_once("settings.php");

if (isset($_GET['Display_all'])) 
{
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['reference_code'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['skills1'] . "</td>";
            echo "<td>" . $row['skills2'] . "</td>";
            echo "<td>" . $row['skills3'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['suburb_town'] . "</td>";
            echo "<td>" . $row['postcode'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['willing_to_move'] . "</td>";
            echo "<td>" . $row['other_skills'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    else 
    {
        echo "No matching found.";
    }
}
else if (isset($_GET['job_number'])) 
{
    $job_num = mysqli_real_escape_string($conn, $_GET['job_number']);
    $sql = "SELECT * FROM EOI WHERE `Job Reference number` LIKE '%$job_num%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['reference_code'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['skills1'] . "</td>";
            echo "<td>" . $row['skills2'] . "</td>";
            echo "<td>" . $row['skills3'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['suburb_town'] . "</td>";
            echo "<td>" . $row['postcode'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['willing_to_move'] . "</td>";
            echo "<td>" . $row['other_skills'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    else 
    {
        echo "No matching found.";
    }
}
else if (isset($_GET['name'])) 
{
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT * FROM EOI WHERE `First name` LIKE '%$name%' OR `Last name` LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['reference_code'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['skills1'] . "</td>";
            echo "<td>" . $row['skills2'] . "</td>";
            echo "<td>" . $row['skills3'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['suburb_town'] . "</td>";
            echo "<td>" . $row['postcode'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['willing_to_move'] . "</td>";
            echo "<td>" . $row['other_skills'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No matching found.";
    }
} else {
        $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['reference_code'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['skills1'] . "</td>";
            echo "<td>" . $row['skills2'] . "</td>";
            echo "<td>" . $row['skills3'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['suburb_town'] . "</td>";
            echo "<td>" . $row['postcode'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['willing_to_move'] . "</td>";
            echo "<td>" . $row['other_skills'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    else
    {
        echo "No matching found.";
    }
}

mysqli_close($conn);
?>