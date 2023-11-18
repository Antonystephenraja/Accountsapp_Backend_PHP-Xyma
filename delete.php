<?php
include_once "conn.php";
$db = $conn;
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$id = $_POST["id"];
$stmt = $db->prepare("DELETE FROM images WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute() === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}
$stmt->close();
$db->close();
?>
