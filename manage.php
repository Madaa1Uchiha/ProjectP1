<!DOCTYPE html>
<html>
<head>
  <title>EOI_Search</title>
</head>
<body>
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
</body>
</html>

<?php
require_once("settings.php");

if (isset($_GET['Display_all'])) 
{
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['Job Reference number'] . "</td>";
            echo "<td>" . $row['First name'] . "</td>";
            echo "<td>" . $row['Last name'] . "</td>";
            echo "<td>" . $row['Street address'] . "</td>";
            echo "<td>" . $row['Suburb/town'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
            echo "<td>" . $row['Postcode'] . "</td>";
            echo "<td>" . $row['Email address'] . "</td>";
            echo "<td>" . $row['Phone number'] . "</td>";
            echo "<td>" . $row['Skill1'] . "</td>";
            echo "<td>" . $row['Skill2'] . "</td>";
            echo "<td>" . $row['Skill3'] . "</td>";
            echo "<td>" . $row['Other Skills'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No matching found.";
    }
}
else if (isset($_GET['job_number'])) 
{
    $job_num = mysqli_real_escape_string($conn, $_GET['job_number']);
    $sql = "SELECT * FROM EOI WHERE `Job Reference number` LIKE '%$job_num%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['Job Reference number'] . "</td>";
            echo "<td>" . $row['First name'] . "</td>";
            echo "<td>" . $row['Last name'] . "</td>";
            echo "<td>" . $row['Street address'] . "</td>";
            echo "<td>" . $row['Suburb/town'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
            echo "<td>" . $row['Postcode'] . "</td>";
            echo "<td>" . $row['Email address'] . "</td>";
            echo "<td>" . $row['Phone number'] . "</td>";
            echo "<td>" . $row['Skill1'] . "</td>";
            echo "<td>" . $row['Skill2'] . "</td>";
            echo "<td>" . $row['Skill3'] . "</td>";
            echo "<td>" . $row['Other Skills'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No matching found.";
    }
}
else if (isset($_GET['name'])) 
{
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT * FROM EOI WHERE `First name` LIKE '%$name%' OR `Last name` LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Last name</th><th>Street address</th><th>Suburb/town</th>
        <th>State</th><th>Postcode</th><th>Email address</th><th>Phone number</th><th>Skill1</th><th>Skill2</th>
        <th>Skill3</th><th>Other Skill</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['Job Reference number'] . "</td>";
            echo "<td>" . $row['First name'] . "</td>";
            echo "<td>" . $row['Last name'] . "</td>";
            echo "<td>" . $row['Street address'] . "</td>";
            echo "<td>" . $row['Suburb/town'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
            echo "<td>" . $row['Postcode'] . "</td>";
            echo "<td>" . $row['Email address'] . "</td>";
            echo "<td>" . $row['Phone number'] . "</td>";
            echo "<td>" . $row['Skill1'] . "</td>";
            echo "<td>" . $row['Skill2'] . "</td>";
            echo "<td>" . $row['Skill3'] . "</td>";
            echo "<td>" . $row['Other Skills'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No matching found.";
    }
} else {
    echo "Please enter a model to search.";
}

mysqli_close($conn);
?>