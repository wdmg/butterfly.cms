<?php
$servername = "db";
$username = "root";
$password = "root";

echo "<h4>MySQL Connection Test #1</h4>";
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "MySQL connected successfully to $servername with username `$username` and password `$password`";
    echo "<br/>";
} catch(PDOException $e) {
    echo "MySQL connection to $servername with username `$username` and password `$password` failed: " . $e->getMessage();
    echo "<br/>";
}


echo "<br/>";
echo "<h4>MySQL Connection Test #2</h4>";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "MySQL connected successfully to $servername with username `$username` and password `$password`";
    echo "<br/>";
} catch(PDOException $e) {
    echo "MySQL connection to $servername with username `$username` and password `$password` failed: " . $e->getMessage();
    echo "<br/>";
}


?>