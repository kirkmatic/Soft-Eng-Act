<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni System</title>
</head>
<body>
    <h2>Login</h2>
    <div class="form-container">
    <div class="form" id="alumni_form" style="display: none;">
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
<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .form {
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
    }

    .form-buttons {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .form-buttons button {
        margin: 0 5px;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
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
