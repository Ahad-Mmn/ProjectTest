<?php
$mysqli = new mysqli("sql302.infinityfree.com","if0_43135289","Willchangelater","if0_43135289_Project045");
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
?>