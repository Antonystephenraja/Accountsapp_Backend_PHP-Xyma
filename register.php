<?php
include_once "conn.php";
$db = $conn;
if (!$db) {
    echo "Database connection failed: " . mysqli_connect_error();
    exit;
}
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['password'])) {
    echo "Invalid request. Please provide name, email, phone, and password.";
    exit;
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$sql = "SELECT * FROM register WHERE name = '".$name."' AND email = '".$email."'";
$result = mysqli_query($db, $sql);
if (!$result) {
    echo "Query error: " . mysqli_error($db);
    exit;
}
$count = mysqli_num_rows($result);
if ($count > 0) {
    echo json_encode("Error");
} else {
    $userId = uniqid(); 
    $insert = "INSERT INTO register (user_id, name, email, phone, password) VALUES ('".$userId."', '".$name."', '".$email."', '".$phone."', '".$password."')";
    $query = mysqli_query($db, $insert);
    if ($query) {
        $response = array(
            'status' => 'SUCCESS',
            'user_id' => $userId
        );
        echo json_encode($response);
    } else {
        echo "Insert error: " . mysqli_error($db);
    }
}
?>
