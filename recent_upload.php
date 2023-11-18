<?php
 include_once "conn.php";
 $db = $conn;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT id, filename,company_name,invoice_no,date,uploader_name,product_name,advance_amount,balance_amount,total_amount,remarks,dropdownController FROM images";
$exe = mysqli_query($conn, $query);

if (!$exe) {
    die("Query execution failed: " . mysqli_error($conn));
}

$arr = array();
while ($row = mysqli_fetch_array($exe)) {
    $arr[] = $row;
}

mysqli_close($conn);

print(json_encode($arr));
?>
