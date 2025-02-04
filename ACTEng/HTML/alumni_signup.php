<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni System</title>
</head>
<body>
    <h2>Alumni Sign Up</h2>
    <form action="../PHP/alumni_signup_handler.php" method="post">
        <label for="alumni_id">Alumni Id:</label>
        <input type="int" id="alumni_id" name="alumni_id" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename"><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contact_no">Contact Number:</label>
        <input type="int" id="contact_no" name="contact_no" required><br><br>

        <input type="submit" value="Sign Up">
    </form>
    <p>Already have an Account? <a href="login.php">Login</a></p>
</body>
</html>