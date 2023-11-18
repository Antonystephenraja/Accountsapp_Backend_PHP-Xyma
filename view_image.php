<?php
include_once "conn.php";
$db = $conn;
$email = $_GET["email"]; // Get the email parameter from the URL
$query = "SELECT id, invoice_no, filename FROM images WHERE email = '$email'";
$exe = mysqli_query($db, $query);
$arr = [];
while ($row = mysqli_fetch_array($exe)) {
    $arr[] = $row;
}
print(json_encode($arr));
?>
