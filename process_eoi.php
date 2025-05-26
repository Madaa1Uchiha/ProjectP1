<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>process applications</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_POST['allow_access'])) {
    // The user hasn't submitted the form, deny access.
    
    header("Location: apply.php");
    die();
  }
?>

  

    

<?php include 'header.inc';     ?>


<main>
<?php
// getting the forms data
$position = trim($_POST['position']);
$firstname = trim($_POST['first-name']);
$middlename = trim($_POST['middle-name']);
$lastname = trim($_POST['last-name']);
$skills1 = trim($_POST['skills1']);
$skills2 = trim($_POST['skills2']);
$skills3 = trim($_POST['skills3']);
$email = trim($_POST['email']);
$phonenumber = trim($_POST['phone-number']);
$state = trim($_POST['state']);
$address = trim($_POST['address']);
$suburb = trim($_POST['suburb']);
$dob = trim($_POST['date-of-birth']);
$gender = trim($_POST['gender']);
$willingtomove = isset($_POST['willing-to-move']) ? 1 : 0;
$otherskills = trim($_POST['other-skills']);
$postcode = trim($_POST['postcode']);

$positionSAN = filter_var($position, FILTER_SANITIZE_STRING);
$firstnameSAN = filter_var($firstname, FILTER_SANITIZE_STRING);
$middlenameSAN = filter_var($middlename, FILTER_SANITIZE_STRING);
$lastnameSAN = filter_var($lastname, FILTER_SANITIZE_STRING);
$skills1SAN = filter_var($skills1, FILTER_SANITIZE_STRING);
$skills2SAN = filter_var($skills2, FILTER_SANITIZE_STRING);
$skills3SAN = filter_var($skills3, FILTER_SANITIZE_STRING);
$emailSAN = filter_var($email, FILTER_SANITIZE_EMAIL);
$phonenumberSAN = filter_var($phonenumber, FILTER_SANITIZE_STRING);
$stateSAN = filter_var($state, FILTER_SANITIZE_STRING);
$addressSAN = filter_var($address, FILTER_SANITIZE_STRING);
$suburbSAN = filter_var($suburb, FILTER_SANITIZE_STRING);
$dobSAN = filter_var($dob, FILTER_SANITIZE_STRING);
$genderSAN = filter_var($gender, FILTER_SANITIZE_STRING);
$willingtomoveSAN = filter_var($willingtomove, FILTER_VALIDATE_BOOLEAN);
$otherskillsSAN = filter_var($otherskills, FILTER_SANITIZE_STRING);
$postcodeSAN = filter_var($postcode, FILTER_SANITIZE_STRING);

if (!empty($phonenumberSAN)) {
    if (filter_var($emailSAN, FILTER_VALIDATE_EMAIL)) {   
// this code started just always sending users back so is commented out rn as its not 100% essential
       /* if (empty($positionSAN)||($firstnameSAN)||($lastnameSAN)||($skills1SAN)
        ||($skills2SAN)||($skills3SAN)||($emailSAN)||($phonenumberSAN)||($stateSAN)
        ||($addressSAN)||($suburbSAN)||($dobSAN)||($genderSAN)||($willingtomoveSAN)||($otherskillsSAN)
        ||($postcodeSAN)) {
            header("Location: apply.php");
          }
*/
$createTableQuery = "CREATE TABLE IF NOT EXISTS `project_part_2`.`eoi` (`EOInumber` INT NOT NULL AUTO_INCREMENT ,
`reference_code` TEXT NOT NULL , `first_name` VARCHAR(20) NOT NULL ,
 `middle_name` VARCHAR(20), `last_name` VARCHAR(20) NOT NULL ,
  `skills1` TEXT NOT NULL , `skills2` TEXT NOT NULL , `skills3` TEXT NOT NULL ,
   `email_address` TEXT NOT NULL , `phone_number` VARCHAR(12) NOT NULL ,
    `state` TEXT NOT NULL , `address` VARCHAR (40) NOT NULL , `suburb_town` VARCHAR(40) NOT NULL ,
     `postcode` INT NOT NULL , `date_of_birth` TEXT NOT NULL , `gender` TEXT NOT NULL ,
      `willing_to_move` BOOLEAN NOT NULL , `other_skills` TEXT , `status` TEXT NOT NULL,
       PRIMARY KEY (`EOInumber`), UNIQUE `email` (`email_address`)) ENGINE = InnoDB;";
       mysqli_query($conn, $createTableQuery);

       $checkEmailQuery = "SELECT email_address FROM eoi WHERE email_address = '$emailSAN'";
       $emailResult = mysqli_query($conn, $checkEmailQuery);
       



       if (mysqli_num_rows($emailResult) > 0) {
           
           
           print("<h1>This email address is already in use. Please use a different email.</h1>");
       } else {



        

$query = "INSERT INTO eoi (
    reference_code, 
    first_name, 
    middle_name, 
    last_name, 
    skills1, 
    skills2, 
    skills3, 
    email_address, 
    phone_number, 
    state, 
    address, 
    suburb_town, 
    postcode, 
    date_of_birth, 
    gender, 
    willing_to_move, 
    other_skills, 
    `status`
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'NEW')";


$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
}


mysqli_stmt_bind_param(
    $stmt,
    "sssssssssssssssbs", 
    $positionSAN,
    $firstnameSAN,
    $middlenameSAN,
    $lastnameSAN,
    $skills1SAN,
    $skills2SAN,
    $skills3SAN,
    $emailSAN,
    $phonenumberSAN,
    $stateSAN,
    $addressSAN,
    $suburbSAN,
    $postcodeSAN,
    $dobSAN,
    $genderSAN,
    $willingtomoveSAN,
    $otherskillsSAN
);


if (mysqli_stmt_execute($stmt)) {
    
    $EOInumber = mysqli_insert_id($conn);
    echo "<h1>Expression of interest received. Your unique EOI number is: $EOInumber</h1>";
} else {
   
    if (mysqli_errno($conn) == 1062) {
        echo "<p>Email already in use! Please use another.</p>";
    } else {
        echo "<p>Error submitting application: " . mysqli_error($conn) . "</p>";
    }
}


mysqli_stmt_close($stmt);
}
}
    }
else {
    echo ("email format is invalid");}





?>
<?php
include 'footer.inc';
?>
</main>
</body>
</html>