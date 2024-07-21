<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountHolder = $_POST['accountHolder'];
    $accountNumber = $_POST['accountNumber'];
    $mobileNumber = $_POST['mobileNumber'];
    $bankName = $_POST['bankName'];

    $stmt = $conn->prepare("INSERT INTO accounts (account_holder, account_number, mobile_number, bank_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $accountHolder, $accountNumber, $mobileNumber, $bankName);

    if ($stmt->execute()) {
        
        header("Location: account_created.php?accountHolder=$accountHolder&accountNumber=$accountNumber&mobileNumber=$mobileNumber&bankName=$bankName");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
