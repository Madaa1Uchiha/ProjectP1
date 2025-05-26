<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="LSCL Group" />
  <meta name="description" content="COS10026 Project Website" />
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'LSCL Group'; ?></title>
  <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>

<header>
  <div class="header-top">
    <img src="images/logo.jpg" alt="LSCL Logo" class="logo" />
    <h1 class="site-title"><?php echo $page_title ?? 'LSCL Group'; ?></h1>
  </div>

  <nav>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="Jobs.php">Jobs</a></li>
      <li><a href="apply.php">Apply</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="enhancements.php">Enhancements</a></li>
      <li><a href="manage.php">Manage</a></li>
    </ul>
  </nav>
</header>
=======
<?php
echo'<header>
    <h1>LSCL Home Page</h1>
    <img src="images/logo.jpg" alt="LSCL Logo" class="logo" />
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="apply.php">Apply</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="login.php">Management</a></li>
        </ul>
    </nav>
</header>'
?>
>>>>>>> origin/project_part2
