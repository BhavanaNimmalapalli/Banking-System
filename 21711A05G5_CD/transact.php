<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountNumber = $_POST['accountNumber'];
    $transactionType = $_POST['transactionType'];
    $amount = $_POST['amount'];

    
    $sql = "SELECT balance FROM accounts WHERE account_number='$accountNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentBalance = $row['balance'];

        if ($transactionType === 'deposit') {
            $newBalance = $currentBalance + $amount;
        } elseif ($transactionType === 'withdrawal') {
            if ($currentBalance >= $amount) {
                $newBalance = $currentBalance - $amount;
            } else {
                $message = "Insufficient balance.";
                exit;
            }
        } else {
            $message = "Invalid transaction type.";
            exit;
        }

       
        $stmt = $conn->prepare("UPDATE accounts SET balance =? WHERE account_number =?");
        $stmt->bind_param("ds", $newBalance, $accountNumber);

        if ($stmt->execute()) {
            
            $stmt = $conn->prepare("INSERT INTO transactions (account_number, transaction_type, amount) VALUES (?,?,?)");
            $stmt->bind_param("ssd", $accountNumber, $transactionType, $amount);
            $stmt->execute();

            $message = "Transaction successful. New balance: ". $newBalance;
        } else {
            $message = "Error updating balance: ". $stmt->error;
        }

        $stmt->close();
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
    <title>Transaction Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transaction.css">
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
    <div id="transaction-form-container">
        <section id="transaction-form">
            <h2>Deposit/Withdraw</h2><br>
            <form action="transact.php" method="post">
                <label for="accountNumber">Account Number:</label>
                <input type="text" id="accountNumber" name="accountNumber" required><br><br>
                <label for="transactionType">Transaction Type:</label>
                <select id="transactionType" name="transactionType" required>
                    <option value="deposit">Deposit</option>
                    <option value="withdrawal">Withdrawal</option>
                </select><br><br>
                <label for="amount">Amount:</label>
                <input type="number" step="0.01" id="amount" name="amount" required><br><br>
                <button type="submit">Submit</button>
            </form>
            </section>
            </div>
            <p align="center"><?php echo "<b>$message</b>";?></p><br> 
        
    
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