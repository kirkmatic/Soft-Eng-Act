<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <title>Alumni System</title>
</head>
<body>
    <div class="container">
        <img src="../IMG/logo.png" alt="University Logo">
        <h1>Welcome to Emmelbhie University Alumni Systems</h1>
        <button onclick="window.location.href='login.php'">Login</button>
    </div>
</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

body {
    font-family: 'Poppins', Arial, sans-serif;
    text-align: center;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
    margin-top: 24px;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container img {
    width: 300px;
    height: auto;
    margin-top: 20px;
}

.container button {
    background-color: #2e2d59;
    color: white;
    padding: 15px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    font-family: 'Poppins', Arial, sans-serif;
    font-weight: bold;
}

.container button:hover {
    background-color: grey;
}

p {
    margin-top: 20px;
}

a {
    color: grey;
    text-decoration: none;
    font-size: 16px;
}

a:hover {
    text-decoration: underline;
}
</style>