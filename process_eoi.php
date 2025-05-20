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

$query = "INSERT INTO eoi (Job_Reference_number, first_name, middle_name, last_name, 
skills1, skills2, skills3, email_address, phone_number, state, address, suburb/town, date_of_birth, gender,
willing-to-move, other-skills) VALUES ('$position', '$firstname', '$middlename', '$lastname'
, '$skills1', '$skills2', '$skills3', '$email', '$phonenumber', '$state'
, '$address', '$suburb', '$dob', '$gender', '$willingtomove', '$otherskills')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Expression of interest recieved\nYour unique EOI number is";
    echo $query = "SELECT EOInumber FROM `eoi` WHERE email = '$email' ";
}
else {
    echo "Application failed. Please try again.";
  }
?>
