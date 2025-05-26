<?php
$page_title = 'LSCL Management Page';

session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="LSCL Group" />
    <title>EOI Search</title>
    <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>

<?php include 'header.inc'; ?>

<main>
    <h2>Search for Applicants</h2>

    <!-- Display all EOIs -->
    <form method="GET">
        <label>Display all EOIs</label>
        <input type="submit" name="Display_all" value="Display">
    </form>

    <!-- Search by job number -->
    <form method="GET">
        <label>Search EOI by Job Reference Number:</label>
        <select name="job_number" required>
            <option value="">Select job reference</option>
            <option value="FSD123">FSD123</option>
            <option value="DS456">DS456</option>
        </select>
        <input type="submit" value="Search">
    </form>

    <!-- Search by name -->
    <form method="GET">
        <label>Search Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Search">
    </form>

    <!-- Delete EOIs by reference code -->
    <form method="GET">
        <label>Delete EOI by Job Reference Number:</label>
        <select name="deleteNum" required>
            <option value="">Select job reference</option>
            <option value="FSD123">FSD123</option>
            <option value="DS456">DS456</option>
        </select>
        <input type="submit" value="Delete">
    </form>

    <h2>Applicants</h2>

    </main>
    <?php include 'footer.inc'; ?>

</body>
</html>

<?php
require_once("settings.php");

function displayTable($result) {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>EOInumber</th><th>Job Reference</th><th>First Name</th><th>Middle Name</th><th>Last Name</th>
    <th>Skill 1</th><th>Skill 2</th><th>Skill 3</th><th>Email</th><th>Phone</th><th>State</th>
    <th>Address</th><th>Suburb</th><th>Postcode</th><th>DOB</th><th>Gender</th><th>Willing to Move</th>
    <th>Other Skill</th><th>Status</th><th></th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        include 'table.inc';
    }
    echo "</table>";
}

// Display all
if (isset($_GET['Display_all'])) {
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);
    echo (mysqli_num_rows($result) > 0) ? displayTable($result) : "No applicants found.";
}
// Search by job number
else if (isset($_GET['job_number'])) {
    $job_num = mysqli_real_escape_string($conn, $_GET['job_number']);
    $sql = "SELECT * FROM EOI WHERE reference_code LIKE '%$job_num%'";
    $result = mysqli_query($conn, $sql);
    echo (mysqli_num_rows($result) > 0) ? displayTable($result) : "No applicants found.";
}
// Search by name
else if (isset($_GET['name'])) {
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT * FROM EOI WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);
    echo (mysqli_num_rows($result) > 0) ? displayTable($result) : "No applicants found.";
}
// Delete by EOI ID
else if (isset($_GET['deleteId'])) {
    $eoi_number = mysqli_real_escape_string($conn, $_GET['deleteId']);
    $delete_sql = "DELETE FROM EOI WHERE EOInumber = '$eoi_number'";
    if (!mysqli_query($conn, $delete_sql)) {
        echo "Error deleting record: " . mysqli_error($conn);
    } else {
        header("Location: manage.php");
    }
}
else
{
    // Default case: display all EOIs
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);
    echo (mysqli_num_rows($result) > 0) ? displayTable($result) : "No applicants found.";
}

// Delete by reference number
if (isset($_GET['deleteNum'])) {
    $ref = mysqli_real_escape_string($conn, $_GET['deleteNum']);
    $delete_sql = "DELETE FROM EOI WHERE reference_code = '$ref'";
    if (!mysqli_query($conn, $delete_sql)) {
        echo "Error deleting record: " . mysqli_error($conn);
    } else {
        header("Location: manage.php");
    }
}

mysqli_close($conn);
?>