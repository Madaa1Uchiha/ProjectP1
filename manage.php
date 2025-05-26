<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}
?>
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
    <h2>Search for Applicants</h2>
    <form method="GET" >
        <label>Display all EOI</label>
        <input type="submit" name="Display_all"value="Display">
    </form>
    <form method="GET" >
        <label>Search EOI by job number:</label>
        <select type="text" name="job_number" required>
        <option value="">Reference number</option>
        <option value="FSD123">FSD123</option>
        <option value="DS456">DS456</option>
    </select>
        <input type="submit" value="Search">
    </form>
    <form method="GET" >
        <label>Search Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Search">
    </form>
    <form method="GET" >
        <label>Delete EOI by Job Reference Number:</label>
        <select type="text" name="deleteNum" required>
            <option value="">Reference number</option>
            <option value="FSD123">FSD123</option>
            <option value="DS456">DS456</option>
        </select>
        <input type="submit" value="delete">
    <h2>Applicants</h2>
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
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Middle name</th><th>Last name</th><th>Skill 1</th><th>Skill 2</th>
        <th>Skill 3</th><th>Email address</th><th>Phone number</th><th>State</th><th>Street address</th><th>Suburb/town</th><th>Postcode</th><th>DOB</th>
        <th>Gender</th><th>Willing to Move</th><th>Other Skill</th><th>Status</th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            include 'table.inc';
        }
        echo "</table>";
    } 
    else 
    {
        echo "No applicants found.";
    }
}
else if (isset($_GET['job_number'])) 
{
    $job_num = mysqli_real_escape_string($conn, $_GET['job_number']);
    $sql = "SELECT * FROM EOI WHERE `reference_code` LIKE '%$job_num%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Middle name</th><th>Last name</th><th>Skill 1</th><th>Skill 2</th>
        <th>Skill 3</th><th>Email address</th><th>Phone number</th><th>State</th><th>Street address</th><th>Suburb/town</th><th>Postcode</th><th>DOB</th>
        <th>Gender</th><th>Willing to Move</th><th>Other Skill</th><th>Status</th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            include 'table.inc';
        }
        echo "</table>";
    }
    else 
    {
        echo "No applicants found.";
    }
}
else if (isset($_GET['name'])) 
{
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT * FROM EOI WHERE `first_name` LIKE '%$name%' OR `last_name` LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Middle name</th><th>Last name</th><th>Skill 1</th><th>Skill 2</th>
        <th>Skill 3</th><th>Email address</th><th>Phone number</th><th>State</th><th>Street address</th><th>Suburb/town</th><th>Postcode</th><th>DOB</th>
        <th>Gender</th><th>Willing to Move</th><th>Other Skill</th><th>Status</th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            include 'table.inc';
        }
        echo "</table>";
    }
    else 
    {
        echo "No applicants found.";
    }
} 
else 
{
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>EOInumber</th><th>Job Reference number</th><th>First name</th><th>Middle name</th><th>Last name</th><th>Skill 1</th><th>Skill 2</th>
        <th>Skill 3</th><th>Email address</th><th>Phone number</th><th>State</th><th>Street address</th><th>Suburb/town</th><th>Postcode</th><th>DOB</th>
        <th>Gender</th><th>Willing to Move</th><th>Other Skill</th><th>Status</th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            include 'table.inc';
        }
        echo "</table>";
    } 
    else
    {
        echo "No applicants found.";
    }
}

if (isset($_GET['deleteId'])) 
{
    $eoi_number = mysqli_real_escape_string($conn, $_GET['deleteId']);
    $delete_sql = "DELETE FROM EOI WHERE EOInumber = '$eoi_number'";
    
    if (!mysqli_query($conn, $delete_sql)) 
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    else 
    {
        header("Location: manage.php");
    }
}

if (isset($_GET['deleteNum'])) 
{
    $deleteNum = mysqli_real_escape_string($conn, $_GET['deleteNum']);
    $delete_sql = "DELETE FROM EOI WHERE reference_code = '$deleteNum'";
    
    if (!mysqli_query($conn, $delete_sql)) 
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }
        else 
    {
        header("Location: manage.php");
    }
}
mysqli_close($conn);
?>
