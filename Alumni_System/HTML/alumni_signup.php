<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <title>Alumni System</title>
</head>
<body>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="../PHP/alumni_signup_handler.php" method="post">
            <div class="form-group">
                <label for="alumni_id">Alumni ID</label>
                <input type="number" id="alumni_id" name="alumni_id" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
            </div>

            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" id="middlename" name="middlename">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" required>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="contact_no">Contact No.</label>
                <input type="tel" id="contact_no" name="contact_no" required>
            </div>

            <input type="submit" value="Sign Up">
        </form>
        <p>Have an account? <a href="login.php">Login</a></p>
    </div>
</body>
<style>
/* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

/* General Reset */
body, h2, form, input, select, p {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', Arial, sans-serif;
}

/* Center the form container */
body {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Compact Form Container */
.container {
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.15);
    max-width: 320px; /* Make it smaller */
    width: 100%;
    text-align: center;
}

/* Form title */
h2 {
    color: #333;
    margin-bottom: 12px;
    font-size: 18px; /* Smaller title */
}

/* Form layout */
form {
    display: flex;
    flex-direction: column;
    text-align: left;
}

/* Single-column form groups */
.form-group {
    margin-bottom: 8px; /* Reduce spacing */
}

/* Two-column layout */
.form-row {
    display: flex;
    gap: 8px; /* Reduce spacing */
}

/* Labels */
label {
    font-weight: 500;
    font-size: 12px; /* Smaller font */
    margin-bottom: 3px;
    display: block;
    color: #444;
}

/* Input and select fields */
input, select {
    padding: 6px; /* Smaller fields */
    font-size: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}

/* Submit button */
input[type="submit"] {
    background-color: #2e2d59;
    color: white;
    font-size: 13px; /* Smaller button */
    font-weight: bold;
    border: none;
    padding: 8px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #444;
}

/* Login link */
p {
    margin-top: 8px;
    font-size: 11px;
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
</html>