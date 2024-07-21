<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Banking Website</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Bank Logo">
        </div>
        <body>
            <div style="text-align:center; padding:5%;">
              <p  style="font-size:25px; font-weight:bold; font-style:italic">
               Hello  <?php 
               if(isset($_SESSION['email'])){
                $email=$_SESSION['email'];
                $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                while($row=mysqli_fetch_array($query)){
                    echo $row['firstName'].' '.$row['lastName'];
                }
               }
               ?>
               :)
              </p>
            </div>
        </body>
        <nav>
            <ul>
                <li>
                    <a href="per-accounts.html"><b>Create User</b></a>
                </li>
                <li>
                    <a href="transactions.html"><b>Transactions</b></a>
                </li>
                <li>
                    <a href="about.html"><b>About Us</b></a>
                </li>
                <li>
                    <a href="contact.html"><b>Contact Us</b></a>
                </li>
                <li>
                <a href="logout.php"><b>Logout</b></a>
                </li>
            </ul>
        </nav>
    </header>
    
    
    <section id="hero">
        <div class="hero-content">
            <h1>Welcome to Our Bank</h1>
            <p>Your trusted partner in financial solutions</p>
            <a href="learn-more.html" class="cta-button">Learn More</a>
        </div>
    </section>
    <section id="features">
        <h2>Discover Our Features</h2>
        <div class="features-list">
            <div class="feature-item" data-image="loans.jpg">
                <h3>Loans</h3>
                <p>Get instant loan approvals and flexible repayment options.</p>
                <div class="feature-image"></div>
                <ul class="feature-list hidden">
                    <li><a >Personal Loan</a></li>
                    <li><a >Gold Loan</a></li>
                    <li><a >Education Loan</a></li>
                </ul>
            </div>
            <div class="feature-item" data-image="digital-banking.jpg">
                <h3>Digital Banking</h3>
                <p>Experience convenient and secure online banking services.</p>
                <div class="feature-image"></div>
                <ul class="feature-list hidden">
                    <li><a >Online Banking</a></li>
                    <li><a >Mobile Banking</a></li>
                    <li><a >Bill Pay</a></li>
                </ul>
            </div>
            <div class="feature-item" data-image="apply-online.jpg">
                <h3>Apply Online</h3>
                <p>Open an account or apply for a loan from the comfort of your home.</p>
                <div class="feature-image"></div>
                <ul class="feature-list hidden">
                    <li ><a >Personal Loan Application</a></li>
                    <li><a >Account Opening</a></li>
                    <li><a >Credit Card Application</a></li>
                </ul>
            </div>
        </div>
    </section>
    
    <section id="services">
        <h2 align="center">Our Services</h2></br>
        <div class="services-list">
            <div class="service-item">
                <img src="personal-banking.jpg" alt="Personal Banking">
                <h3>Personal Banking</h3>
                <p>Personalized banking solutions for all your needs.</p>
            </div>
            <div class="service-item">
                <img src="Business-Banking.png" alt="Business Banking">
                <h3>Business Banking</h3>
                <p>Comprehensive solutions for business growth.</p>
            </div>
            <div class="service-item">
                <img src="Wealth-Management.jpeg" alt="Wealth Management">
                <h3>Wealth Management</h3>
                <p>Expert guidance for managing your wealth.</p>
            </div>
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
