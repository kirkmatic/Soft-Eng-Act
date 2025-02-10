<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <title>Alumni System</title>
</head> -->
<?php
    include '../includes/header.php';
?>
<body>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 0;
        }

        .form {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            display: none;
        }
        .form h2 {
            text-align: center;
            font-family: 'Poppins', Arial, sans-serif;
            font-weight: bold;
            color: #2e2d59;
        }
        .form p {
            text-align: center;
            font-family: 'Poppins', Arial, sans-serif;
            color: black;
            font-size: 14px;
        }
        .form a {
            color: #2e2d59;
            text-decoration: none;
            font-weight: bold;
        }
        .form-buttons {
            display: flex;
            justify-content: center;
            margin-top: -80px;
        }

        .form-buttons button {
            margin: 0 5px;
            padding: 5px 10px;
            cursor: pointer;
            background-color: #2e2d59;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            padding: 10px 20px;
        }

        .form-buttons button:hover {
            background-color: grey;
        }
        .form img {
            display: block;
            margin: 0 auto 10px;
            width: 100px;
            height: auto;
            font-family: Popins;
        }
        .form input[type="text"],
        .form input[type="password"],
        .form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form input[type="submit"] {
            background-color: #2e2d59;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background-color: grey;
        }
    </style>
    <div class="form-container">
        <div class="form" id="alumni_form">
            <img src="../IMG/logo.png" alt="University Logo">
            <h2>Alumni Login</h2>
            <form action="../PHP/alumni_auth_handler.php" method="post">
                <label for="alumni_id">Alumni ID:</label>
                <input type="text" id="alumni_id" name="alumni_id" required>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <input type="submit" value="Login">
            </form>
            <p>Don't have an Account? <a href="alumni_signup.php">Sign up </a></p>
        </div>
        <div class="form" id="admin_form">
            <img src="../IMG/logo.png" alt="University Logo">
            <h2>Admin Login</h2>
            <form action="../PHP/admin_auth_handler.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br><br>
                <label for="admin_password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <input type="submit" value="Login">
            </form>
            <p>Don't have an Account? <a href="admin_signup.php">Sign up </a></p>
        </div>
    </div>

    <div class="form-buttons">
        <button onclick="showForm('admin_form')">Admin</button>
        <button onclick="showForm('alumni_form')">Alumni</button>
    </div>
</body>
</html>
<script>
    function showForm(formId) {
        var forms = document.getElementsByClassName('form');
        for (var i = 0; i < forms.length; i++) {
            forms[i].style.display = 'none';
        }
        document.getElementById(formId).style.display = 'block';
    }

    // Set initial form
    showForm('alumni_form');
</script>
