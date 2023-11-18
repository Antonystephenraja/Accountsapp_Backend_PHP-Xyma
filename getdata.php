<?php
// Database configuration
include_once "conn.php";
$db = $conn;
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch data from the table
$query = "SELECT * FROM images";
$result = $db->query($query);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // Convert the data to JSON format
    $json = json_encode($data);
    echo $json;
} else {
    echo "No records found";
}

// Close the connection
$db->close();
?>
