<?php
include_once "conn.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the image data
$image = $_POST['image'];
$company_name = $_POST['company_name'];
$invoice_no = $_POST['invoice_no'];
$date = $_POST['date'];
$uploader_name = $_POST['uploader_name'];
$product_name = $_POST['product_name'];
$advance_amount = $_POST['advance_amount'];
$balance_amount = $_POST['balance_amount'];
$total_amount = $_POST['total_amount'];
$remarks = $_POST['remarks'];
$dropdownController = $_POST['dropdownController'];
$email = $_POST['email'];

// Generate a unique filenameasf
$filename = uniqid() . '.jpg';

// Directory to save the image
$targetDir = 'uploads/';
$targetPath = $targetDir . $filename;

// Save the image to the server
file_put_contents($targetPath, base64_decode($image));

// Insert the image filename into the MySQL database
$sql = "INSERT INTO images (filename, company_name, invoice_no, date, uploader_name, product_name, advance_amount, balance_amount, total_amount, remarks, dropdownController,email) VALUES ('$filename', '$company_name', '$invoice_no', '$date', '$uploader_name', '$product_name', '$advance_amount', '$balance_amount', '$total_amount', '$remarks', '$dropdownController', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Image uploaded successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
