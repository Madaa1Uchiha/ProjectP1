<?php
$page_title = 'Process Application';

require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Redirect if access is not via form
if (!isset($_POST['allow_access'])) {
    header("Location: apply.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="LSCL Group" />
    <meta name="description" content="Processing job application" />
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>

<?php include 'header.inc'; ?>

<main>
<?php
// Sanitize form inputs
function clean_input($data) {
    return htmlspecialchars(trim($data));
}

$position       = clean_input($_POST['position']);
$firstname      = clean_input($_POST['first-name']);
$middlename     = clean_input($_POST['middle-name']);
$lastname       = clean_input($_POST['last-name']);
$skills1        = clean_input($_POST['skills1']);
$skills2        = clean_input($_POST['skills2']);
$skills3        = clean_input($_POST['skills3']);
$email          = filter_var(clean_input($_POST['email']), FILTER_SANITIZE_EMAIL);
$phonenumber    = clean_input($_POST['phone-number']);
$state          = clean_input($_POST['state']);
$address        = clean_input($_POST['address']);
$suburb         = clean_input($_POST['suburb']);
$postcode       = clean_input($_POST['postcode']);
$dob            = clean_input($_POST['date-of-birth']);
$gender         = clean_input($_POST['gender']);
$willingtomove  = isset($_POST['willing-to-move']) ? 1 : 0;
$otherskills    = clean_input($_POST['other-skills']);

// Validation: Check email format and phone number
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Invalid email format.</p>";
} elseif (!preg_match('/^[0-9]{8,12}$/', $phonenumber)) {
    echo "<p>Phone number must be 8 to 12 digits.</p>";
} else {
    // Create table if not exists
    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS eoi (
            EOInumber INT AUTO_INCREMENT PRIMARY KEY,
            reference_code TEXT NOT NULL,
            first_name VARCHAR(20) NOT NULL,
            middle_name VARCHAR(20),
            last_name VARCHAR(20) NOT NULL,
            skills1 TEXT NOT NULL,
            skills2 TEXT NOT NULL,
            skills3 TEXT NOT NULL,
            email_address TEXT NOT NULL UNIQUE,
            phone_number VARCHAR(12) NOT NULL,
            state TEXT NOT NULL,
            address VARCHAR(40) NOT NULL,
            suburb_town VARCHAR(40) NOT NULL,
            postcode INT NOT NULL,
            date_of_birth TEXT NOT NULL,
            gender TEXT NOT NULL,
            willing_to_move BOOLEAN NOT NULL,
            other_skills TEXT,
            status TEXT NOT NULL
        ) ENGINE=InnoDB;
    ";
    mysqli_query($conn, $createTableQuery);

    // Check for duplicate email
    $checkEmail = "SELECT email_address FROM eoi WHERE email_address = '$email'";
    $emailResult = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($emailResult) > 0) {
        echo "<p>This email address is already in use. Please use a different email.</p>";
    } else {
        // Insert data
        $query = "
            INSERT INTO eoi (
                reference_code, first_name, middle_name, last_name,
                skills1, skills2, skills3, email_address, phone_number,
                state, address, suburb_town, postcode, date_of_birth,
                gender, willing_to_move, other_skills, status
            )
            VALUES (
                '$position', '$firstname', '$middlename', '$lastname',
                '$skills1', '$skills2', '$skills3', '$email', '$phonenumber',
                '$state', '$address', '$suburb', '$postcode', '$dob',
                '$gender', '$willingtomove', '$otherskills', 'NEW'
            )
        ";

        if (mysqli_query($conn, $query)) {
            $eoiQuery = "SELECT EOInumber FROM eoi WHERE email_address = '$email'";
            $eoiResult = mysqli_query($conn, $eoiQuery);
            $row = mysqli_fetch_assoc($eoiResult);
            echo "<h2>Application submitted successfully.</h2>";
            echo "<p>Your unique EOI number is: <strong>" . $row['EOInumber'] . "</strong></p>";
        } else {
            echo "<p>Error submitting application: " . mysqli_error($conn) . "</p>";
        }
    }
}

mysqli_close($conn);
?>
</main>

<?php include 'footer.inc'; ?>
</body>
</html>