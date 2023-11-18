<?php
// Connect to MySQL
include_once "conn.php";
$db = $conn;
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// Fetch data from the database
$sql = "SELECT SUM(total_amount) FROM images";  
$result = $db->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
