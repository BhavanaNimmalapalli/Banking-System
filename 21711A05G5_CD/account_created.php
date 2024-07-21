<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$accountNumber = $_GET['accountNumber'];


$sql = "SELECT * FROM accounts WHERE account_number='$accountNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $accountHolder = $row['account_holder'];
    $mobileNumber = $row['mobile_number'];
    $bankName = $row['bank_name'];
} else {
    echo "Account not found.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Created</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="per-accounts.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="logo.png" alt="Bank Logo">
    </div>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<section id="account-details">
    <h2 align="center">Account Created Successfully</h2><br>
    <div class="account-info">
        <p align="center"><strong>Account Holder Name:</strong> <?php echo htmlspecialchars($accountHolder); ?></p>
        <p align="center"><strong>Account Number:</strong> <?php echo htmlspecialchars($accountNumber); ?></p>
        <p align="center"><strong>Mobile Number:</strong> <?php echo htmlspecialchars($mobileNumber); ?></p>
        <p align="center"><strong>Bank Name:</strong> <?php echo htmlspecialchars($bankName); ?></p></br>
    </div>
</section>
<footer>
    <div class="footer-content">
        <p>&copy; 2024 Banking Website. All rights reserved.</p>
        <p>Contact us: (123) 456-7890 | info@bank.com</p>
        <p>Follow us on:
            <a href="#">Facebook</a> |
            <a href="#">Twitter</a> |
            <a href="#">LinkedIn</a>
        </p>
    </div>
</footer>
</body>
</html>
