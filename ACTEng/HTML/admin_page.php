<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav h1 {
            margin: 0;
        }
        nav form {
            display: inline-block;
            margin-top: 10px;
        }
        nav button {
            background-color: #ff4b5c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        nav button:hover {
            background-color: #ff1c3c;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Alumni Records</h2>

    <nav>
        <div class="nav-container">
            <h1>Welcome!</h1>
            <form action="../PHP/logout.php" method="post">
            <button type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Display Alumni Records -->
    <table border="1">
        <thead>
            <tr>
                <th>Alumni Key</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>College</th>
                <th>Program</th>
                <th>Section</th>
                <th>Work Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Assuming you have a database connection established
                include '../PHP/db_connection.php'; // Include your DB connection script

                // Query to fetch joined data from both tables
                $query = "SELECT 
                alumni_info_table.alumni_id, 
                alumni_info_table.lastname, 
                alumni_info_table.firstname, 
                alumni_info_table.middlename, 
                alumni_info_table.gender, 
                alumni_info_table.birthday, 
                alumni_info_table.address, 
                alumni_info_table.email, 
                alumni_info_table.contact_no, 
                alumni_background_table.college, 
                alumni_background_table.program, 
                alumni_background_table.section, 
                alumni_background_table.work_status 
              FROM alumni_info_table 
              INNER JOIN alumni_background_table 
              ON alumni_info_table.alumni_id = alumni_background_table.alumni_id";
    
              
                $result = mysqli_query($conn, $query); // Execute the query
                
                // Check if there are any results
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['alumni_id'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['middlename'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['birthday'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['contact_no'] . "</td>";
                        echo "<td>" . $row['college'] . "</td>";
                        echo "<td>" . $row['program'] . "</td>";
                        echo "<td>" . $row['section'] . "</td>";
                        echo "<td>" . $row['work_status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No records found</td></tr>";
                }
                
                // Close the database connection
                mysqli_close($conn);
            ?>
        </tbody>
    </table>

</body>
</html>
