<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
    <link rel="stylesheet" href="index.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button id="recoverPasswordBtn">Recover Password</button>

    <div id="recoverPassword" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Recover Password</h2>
            <form method="post" action="recover-password.php">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="recoverEmail" id="recoverEmail" placeholder="Email" required>
                    <label for="recoverEmail">Email</label>
                </div>
                <input type="submit" class="btn" value="Recover Password" name="recoverPassword">
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById('recoverPassword');

        var modalBtn = document.getElementById('recoverPasswordBtn');

        var closeBtn = document.getElementById('closeModal');

    
        modalBtn.addEventListener('click', openModal);

        closeBtn.addEventListener('click', closeModal);

        window.addEventListener('click', outsideClick);

        function openModal(e) {
            e.preventDefault(); 
            modal.style.display = 'block';
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        function outsideClick(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
<?php
if (isset($_POST['recoverPassword'])) {
    $email = $_POST['recoverEmail'];
    
    echo "A password recovery link has been sent to $email.";
} else {
    echo "Please submit the form.";
}
?>
