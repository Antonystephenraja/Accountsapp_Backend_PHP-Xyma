<?php
// Assuming you have established a valid database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "accounts_app";

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Check if the required fields are provided
if(isset($_POST['id']) && isset($_POST['product_name']) && isset($_POST['company_name']) && isset($_POST['invoice_no'])&& isset($_POST['uploader_name'])&& isset($_POST['date'])&& isset($_POST['advance_amount'])&& isset($_POST['balance_amount'])&& isset($_POST['total_amount'])&& isset($_POST['dropdownController'])&& isset($_POST['remarks'])) {
    // Extract the parameters from the POST request
    $id = $_POST['id'];
    $productName = $_POST['product_name'];
    $companyName = $_POST['company_name'];
    $invoiceNumber = $_POST['invoice_no'];
    $UploderName = $_POST['uploader_name'];
    $Date = $_POST['date'];
    $AdvanceAmount = $_POST['advance_amount'];
    $BalanceAmount = $_POST['balance_amount'];
    $TotalAmount = $_POST['total_amount'];
    $Remarks = $_POST['remarks'];
    $DropdownController = $_POST['dropdownController'];

    // Prepare and execute the update statement
    $sql = "UPDATE images SET product_name = :product_name, company_name = :company_name, invoice_no = :invoice_no, uploader_name = :uploader_name , date = :date, advance_amount = :advance_amount, balance_amount = :balance_amount, total_amount = :total_amount, remarks = :remarks, dropdownController = :dropdownController WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':product_name', $productName);
    $stmt->bindParam(':company_name', $companyName);
    $stmt->bindParam(':invoice_no', $invoiceNumber);
    $stmt->bindParam(':uploader_name', $UploderName);
    $stmt->bindParam(':date', $Date);
    $stmt->bindParam(':advance_amount', $AdvanceAmount);
    $stmt->bindParam(':balance_amount', $BalanceAmount);
    $stmt->bindParam(':total_amount', $TotalAmount);
    $stmt->bindParam(':remarks', $Remarks);
    $stmt->bindParam(':dropdownController', $DropdownController);

    // Check if the update was successful
    if ($stmt->execute()) {
        // Return a success message
        echo "Record updated successfully";
    } else {
        // Return an error message
        echo "Failed to update record";
    }
} else {
    // Return an error message if required fields are missing
    echo "Missing required parameters";
}

// Close the database connection
$conn = null;
?>
