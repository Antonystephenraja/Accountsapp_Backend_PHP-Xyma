<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id']) && isset($_POST['data'])) {
        $userId = $_POST['user_id'];
        $data = $_POST['data'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accounts_app";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO uploads (user_id, data) VALUES (:user_id, :data)");
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            $conn = null;

            echo "Data uploaded successfully.";
        } catch (PDOException $e) {
            http_response_code(500);
            echo "Error: " . $e->getMessage();
        }
    } else {
        http_response_code(400);
        echo "Missing parameters.";
    }
} else {
    http_response_code(405);
    echo "Invalid request method.";
}

?>
