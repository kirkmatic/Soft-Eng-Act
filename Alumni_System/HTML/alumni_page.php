<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    
    <title>Alumni System</title>
</head>
<style>
/* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

/* General Reset */
body, h1, h2, form, input, table, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', Arial, sans-serif;
}

/* Body Styling */
body {
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

/* Navigation Bar */
nav {
    width: 100%;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    border-radius: 6px;
}

nav h1 {
    font-size: 18px;
    color: #2e2d59;
}

nav form button {
    background: none;
    border: none;
    cursor: pointer;
}

nav form button:hover {
    background-color: lightgrey;
}

nav form button img {
    width: 24px;
    height: 24px;
}

/* Table Styling */
.table-container {
    width: 100%;
    max-width: 800px;
    margin: 20px 0;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background: #2e2d59;
    color: white;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Form Container */
.form-container {
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 400px;
}

.form-container h2 {
    margin-bottom: 10px;
    font-size: 18px;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: 500;
    font-size: 12px;
    margin-top: 8px;
}

input {
    padding: 6px;
    font-size: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    margin-top: 4px;
}

button {
    background-color: #2e2d59;
    color: white;
    font-size: 13px;
    font-weight: bold;
    border: none;
    padding: 8px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 12px;
}

button:hover {
    background-color: #444;
}

    </style>
<body>
    <!-- Navigation Bar -->
    <nav>
        <h1>Welcome!</h1>
        <form action="../PHP/logout.php" method="post">
            <button type="submit">
                <img src="../IMG/logout_icon.png" alt="Logout">
            </button>
        </form>
    </nav>

    <h1>Hello Alumni!</h1>

    <!-- Alumni Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alumni ID</th> 
                    <th>College</th>              
                    <th>Program</th>
                    <th>Section</th>
                    <th>Work Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../PHP/db_connection.php';    

                $sql = "SELECT * FROM alumni_background_table";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['alumni_id']}</td>
                                <td>{$row['college']}</td>
                                <td>{$row['program']}</td>
                                <td>{$row['section']}</td>
                                <td>{$row['work_status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Alumni Form -->
    <div class="form-container">
        <h2>Add your background record</h2>
        <form action="../PHP/insert_alumni_background.php" method="post">
            <label for="college">College:</label>
            <input type="text" id="college" name="college" required>

            <label for="program">Program:</label>
            <input type="text" id="program" name="program" required>

            <label for="section">Section:</label>
            <input type="text" id="section" name="section" required>

            <label for="work_status">Work Status:</label>
            <input type="text" id="work_status" name="work_status" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html></form>