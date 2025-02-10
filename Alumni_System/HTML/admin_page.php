<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <title>Alumni System</title>
    <style>
/* General Reset */
body, h1, h2, table, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
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

/* Table Container */
.table-container {
    width: 100%;
    /* max-width: 900px; */
    margin: 20px 0;
    overflow-x: auto;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

th, td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background: #2e2d59;
    color: white;
    font-size: 18px;
}

td {
    font-size: 14px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e3e3e3;
}

    </style>
</head>
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

    <h2>Alumni Records</h2>

    <!-- Alumni Table -->
    <div class="table-container">
        <table>
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
                    include '../PHP/db_connection.php'; 

                    // Query to fetch alumni information with background details
                    $query = "SELECT 
                        a.alumni_id, a.lastname, a.firstname, a.middlename, a.gender, a.birthday, 
                        a.address, a.email, a.contact_no, 
                        b.college, b.program, b.section, b.work_status 
                    FROM alumni_info_table a
                    INNER JOIN alumni_background_table b ON a.alumni_id = b.alumni_id";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['alumni_id']}</td>
                                <td>{$row['lastname']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['middlename']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['birthday']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['contact_no']}</td>
                                <td>{$row['college']}</td>
                                <td>{$row['program']}</td>
                                <td>{$row['section']}</td>
                                <td>{$row['work_status']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>No records found</td></tr>";
                    }

                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
