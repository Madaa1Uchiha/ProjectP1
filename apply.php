<!--
this page is where applicants fill out there information into the various forms to be submitted
it takes various info such as their state, name, gender which role they are applying to and other important info
 -->
 <?php $page_title = 'LSCL Apply Page'; ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <!--meta info-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Cole Souquet-Wigg">
    <meta name="description" content="Apply for a job and join the team">
    <meta name="keywords" content="jobs, careers, apply, career opportunity">
    <title>Apply Page</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php include 'header.inc'; ?>

    <main>
        <form method="post" action="process_eoi.php">
<<<<<<< HEAD
        <fieldset>
                <legend>Position</legend>
                <label for="position">Job Reference Number</label>
                <select name="position" id="position" required>
                    <option value="">Reference number</option>
                    <option value="FSD123">FSD123</option>
                    <option value="DS456">DS456</option>
                </select>
=======
        <fieldset><?php
        $job_ref = trim($_POST['job_ref']);
        
                echo ('<legend>Position</legend>'),
                 ('<label for="position">Job Reference Number</label>'),
                 ('<select name="position" id="position" required>'),
                     ('<option value=$job_ref>'), ("(Selected from previous page)"),($job_ref), ('</option>'),
                     ('<option value="FR432">FR432</option>'),
                     ('<option value="DS456">DS456</option>'),
                 ('</select>');
                
                ?>
>>>>>>> origin/project_part2
            </fieldset>
            <fieldset>
                <legend>Your name</legend>
                <label for="first-name">First name</label>
                <input type="text" name="first-name" id="first-name" pattern="[^0-9]*" maxlength="20" required>

                <label for="middle-name">Middle name</label>
                <input type="text" name="middle-name" id="middle-name" value="optional" pattern="[^0-9]*" maxlength="20">

                <label for="last-name">Last name</label>
                <input type="text" name="last-name" id="last-name" pattern="[^0-9]*" maxlength="20" required>
            </fieldset>
            <fieldset>
            <label>Skills</label>
            <textarea name="skills1" id="skills1"></textarea>
            <textarea name="skills2" id="skills2"></textarea>
            <textarea name="skills3" id="skills3"></textarea>
            </fieldset>
            <fieldset>
                <legend>Contact details</legend>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required pattern="[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}" title="example@example.com">

                <label for="phone-number">Mobile phone number</label>
                <input type="tel" name="phone-number" id="phone-number" required pattern="[0-9]{8,12}">
            </fieldset>

            <fieldset>
                <legend>Location</legend>
                <label for="state">State or territory</label>
                <select name="state" id="state" required>
                    <option value="">State</option>
                    <option value="act">ACT</option>
                    <option value="vic">VIC</option>
                    <option value="nsw">NSW</option>
                    <option value="nt">NT</option>
                    <option value="sa">SA</option>  
                    <option value="wa">WA</option>
                    <option value="tas">TAS</option>
                    <option value="qld">QLD</option>
                </select>

                <label for="address">Address</label>
                <input type="text" name="address" id="address" maxlength="40"   >

                <label for="suburb">Suburb/Town</label>
                <input type="text" name="suburb" id="suburb" required maxlength="40">

                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" id="postcode">
            </fieldset>

            <fieldset>
                <legend>Other Details</legend>
                <label for="date-of-birth">Date of birth</label>
                <input type="text" name="date-of-birth" id="date-of-birth" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">

                <label for="male" class="checkandradio">Male</label>
                <input type="radio" name="gender" id="male" value="Male" required class = "exclude">

                <label for="female" class="checkandradio">Female</label>
                <input type="radio" name="gender" id="female" value="Female" class = "exclude">

                <label for="other-prefer-not-to-say" class="checkandradio">Other/prefer not to say</label>
                <input type="radio" name="gender" id="other-prefer-not-to-say" value="Other/prefer not to say" class = "exclude">

                <div>
                    <label for="willing-to-move" class="checkandradio">Are you willing to move closer to our office?</label>
<<<<<<< HEAD
                    <input type="checkbox" name="willing-to-move" id="willing-to-move" value="1">
=======
                    <input type="checkbox" name="willing-to-move" id="willing-to-move" value="1" class = "exclude">
>>>>>>> origin/project_part2
                  </div>                  

                <label for="other-skills">Other Skills</label>
                <textarea name="other-skills" id="other-skills"></textarea>
            </fieldset>
            <input type="hidden" name="allow_access" value="true">
            <input type="submit" value="Apply">
            <input type="reset" value="Reset Form">
        </form>
    </main>

 <?php include 'footer.inc'; ?>
</body>
</html>
