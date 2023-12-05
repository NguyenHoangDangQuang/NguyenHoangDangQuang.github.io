<?php
define("LOCALHOST", 'localhost');
define("USERNAME", 'root');
define("PASSWORD", '');
define("DATABASENAME", 'thethao');

$conn = @mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DATABASENAME)
	or die('Could not connect to MySQL: ' . mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');
?>