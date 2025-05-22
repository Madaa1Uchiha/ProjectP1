<?php
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

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
$willingtomove = trim($_POST['willing-to-move']);
$otherskills = trim($_POST['other-skills']);
$postcode = trim($_POST['postcode']);

$createTableQuery = "CREATE TABLE IF NOT EXISTS `project_part_2`.`eoi` (`EOInumber` INT NOT NULL AUTO_INCREMENT ,
`reference_code` TEXT NOT NULL , `first_name` VARCHAR(20) NOT NULL ,
 `middle_name` VARCHAR(20), `last_name` VARCHAR(20) NOT NULL ,
  `skills1` TEXT NOT NULL , `skills2` TEXT NOT NULL , `skills3` TEXT NOT NULL ,
   `email_address` TEXT NOT NULL , `phone_number` VARCHAR(12) NOT NULL ,
    `state` TEXT NOT NULL , `address` VARCHAR (40) NOT NULL , `suburb_town` VARCHAR(40) NOT NULL ,
     `postcode` INT NOT NULL , `date_of_birth` TEXT NOT NULL , `gender` TEXT NOT NULL ,
      `willing_to_move` BOOLEAN NOT NULL , `other_skills` TEXT ,
       PRIMARY KEY (`EOInumber`), UNIQUE `email` (`email_address`)) ENGINE = InnoDB;";
       mysqli_query($conn, $createTableQuery);

$query = "INSERT INTO eoi (reference_code, first_name, middle_name, last_name, 
skills1, skills2, skills3, email_address, phone_number, state, address, suburb_town, postcode, date_of_birth, gender,
willing_to_move, other_skills) VALUES ('$position', '$firstname', '$middlename', '$lastname'
, '$skills1', '$skills2', '$skills3', '$email', '$phonenumber', '$state'
, '$address', '$suburb','$postcode', '$dob', '$gender', '$willingtomove', '$otherskills')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Expression of interest recieved\nyour unique EOI number is";
     $EOInum = "SELECT EOInumber FROM `eoi` WHERE email_address = '$email' ";
    $getEOInum = mysqli_query($conn, $EOInum);
   
   
    while($row = mysqli_fetch_assoc($getEOInum)) {
        echo ": " . $row["EOInumber"]. "<br>";
      }


}
else {
    echo "Application failed. Please try again.";
   
  }
?>
