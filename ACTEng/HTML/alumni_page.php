<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Background</title>
</head>
<body>
    <h1>Alumni Background</h1>
    <nav>
        <h1>Welcome!</h1>
        <form action="../PHP/logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </nav>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>College</th>
                <th>Program</th>
                <th>Section</th>
                <th>Work Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display data from the database -->
            <?php
            include '../PHP/db_connection.php';    

            $sql = "SELECT * FROM alumni_background_table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
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

    <h2>Add New Alumni Background</h2>
    <form action="../PHP/insert_alumni_background.php" method="post">
        <label for="college">College:</label>
        <input type="text" id="college" name="college" required><br><br>
        <label for="program">Program:</label>
        <input type="text" id="program" name="program" required><br><br>
        <label for="section">Section:</label>
        <input type="text" id="section" name="section" required><br><br>
        <label for="work_status">Work Status:</label>
        <input type="text" id="work_status" name="work_status" required><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html></form>