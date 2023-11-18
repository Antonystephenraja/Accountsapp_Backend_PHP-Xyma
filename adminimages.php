<?php
include_once "conn.php";
$db = $conn;
$query = "SELECT id, invoice_no, filename FROM images";
$exe = mysqli_query($db, $query);
$arr = [];
while ($row = mysqli_fetch_array($exe)) {
    $arr[] = $row;
}
print(json_encode($arr));
?>
