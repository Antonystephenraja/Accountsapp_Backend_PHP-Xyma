<?php
ini_set('memory_limit', '1024M');
require "conn.php";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
$sql = "SELECT * FROM images";
$query = mysqli_query($conn, $sql);
$sensors = [];
while ($row = mysqli_fetch_assoc($query)) {
    $sensors[] = [
        'id' => $row['id'],
        'company_name' => $row['company_name'],
        'invoice_no' => $row['invoice_no'],
        'email' => $row['email'],
        'date' => $row['date'],
        'uploader_name' => $row['uploader_name'],
        'product_name' => $row['product_name'],
        'advance_amount' => $row['advance_amount'],
        'balance_amount' => $row['balance_amount'],
        'total_amount' => $row['total_amount'],
        'remarks' => $row['remarks'],
        'dropdownController' => $row['dropdownController']
    ];  
}
echo json_encode($sensors);
?>