<?php
include_once "conn.php";
$db = $conn;
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
 $id = $_POST['id'];
// $updatedFilename = $_POST['filename'];
$updatedCompanyName = $_POST['company_name'];
$updatedInvoiceNo = $_POST['invoice_no'];
$updatedDate = $_POST['date'];
$updatedUploaderName = $_POST['uploader_name'];
$updatedAdvanceAmount = $_POST['advance_amount'];
$updatedBalanceAmount = $_POST['balance_amount'];
$updatedTotalAmount = $_POST['total_amount'];
$updatedRemarks = $_POST['remarks'];
$updatedPaidedby = $_POST['dropdownController'];
$sql = "UPDATE images SET company_name = '$updatedCompanyName', invoice_no = '$updatedInvoiceNo', date = '$updatedDate', uploader_name = '$updatedUploaderName', advance_amount = '$updatedAdvanceAmount', balance_amount = '$updatedBalanceAmount', total_amount = '$updatedTotalAmount', remarks = '$updatedRemarks', dropdownController = '$updatedPaidedby' WHERE id = '$id'";

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->error;
}
$db->close();
?>
