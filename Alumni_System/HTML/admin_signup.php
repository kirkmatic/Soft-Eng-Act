<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <title>Alumni System</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 28px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width:400px;
            text-align: center;
        }
        h2 {
            font-family: Poppins, Arial, sans-serif;
            margin-bottom: 20px;
            color: #2e2d59;
        }
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            padding-left: 20px;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-left: 20px;
        }
        input[type="submit"] {
            background-color: #2e2d59;
            color: white;
            border: none;
            font-weight: bold;
            padding: 15px 25px;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 40px);
            margin-left: 20px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: grey;
        }
        p {
            margin-top: 20px;
        }
        a {
            color: #2e2d59;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Signup</h2>
        <form action="../PHP/admin_signup_handler.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Signup">
        </form>
        <p>Already have an Account? <a href="login.php">Login</a></p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include '../PHP/db_connection.php';
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $user = $_POST['username'];
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO admin_table (username, password) VALUES (?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $user, $pass);

            if ($stmt->execute()) {
                echo "New admin registered successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>