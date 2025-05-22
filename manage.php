<?php
require_once 'settings.php'

?>
<!DOCTYPE html>
<html>
<head>
  <title>EOI_Search</title>
</head>
<body>
    <form method="GET" action="EOI_Search.php">
        <label>Display all EOI</label>
        <input type="submit" name="Display_all" value="Display">
    </form>
    <form method="GET" action="EOI_Search.php">
        <label>Search EOI by job number:</label>
        <input type="text" name="job_number" required>
        <input type="submit" value="Search">
    </form>
    <form method="GET" action="EOI_Search.php">
        <label>Search Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Search">
    </form>  
</body>
</html>