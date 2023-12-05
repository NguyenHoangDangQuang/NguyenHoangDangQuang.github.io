<!-- index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thể Thao Nha Trang</title>
    <!-- Include Tailwind CSS or any other stylesheets -->
    <link href="../output.css" rel="stylesheet">
</head>
<?php include './php_admin/connect.php'; ?>

<body>

    <?php include 'navbar.php'; ?>
    <div id="home">
        <?php include 'hero.php'; ?>
    </div>

    <?php include 'benefit.php'; ?>
    <div id="about_us">
        <?php include 'about_us.php'; ?>
    </div>
    <div id="khoahoc">
        <?php include 'course.php'; ?>
    </div>
    <div id="get_started">
        <?php include 'get_started.php'; ?>
    </div>
    <?php include 'footer.php'; ?>

    <!-- Your other content -->

</body>

</html>