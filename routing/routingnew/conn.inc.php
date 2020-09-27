<?php
    $servername = "sql213.epizy.com";
$username = "epiz_24947486";
$password = "8zQ77ysI7I";
$dbname = "epiz_24947486_hackminers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>