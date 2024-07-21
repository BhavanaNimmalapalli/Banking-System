<?php
$servername = "localhost";
$username = "root";
$password = "";      
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$balance = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountNumber = $_POST['accountNumber'];

    
    $sql = "SELECT balance FROM accounts WHERE account_number='$accountNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $balance = $row['balance'];
        $message = "Current Balance: $balance";
    } else {
        $message = "Account not found.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Balance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="balance.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Bank Logo">
        </div>
        <nav>
            <ul>
            <li><a href="homepage.php"><b>Home</b></a></li>
                <li><a href="about.html"><b>About Us</b></a></li>
                <li><a href="contact.html"><b>Contact Us</b></a></li>
                <li><a href="logout.php" ><b>Logout</b></a></li>
            </ul>
        </nav>
    </header>
    <h2 align="center"><br>Check Balance</h2>
    <div id="balance-container" align="center">
        <form action="balance.php" method="post">
            <label for="accountNumber"><b>Account Number:</b></label>
            <input type="text" id="accountNumber" name="accountNumber" required><br><br>
            <button type="submit"><b>Check Balance</b></button>
        </form>
        <p><?php echo "<b>$message</b>";?></p></br>
    </div>
    
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