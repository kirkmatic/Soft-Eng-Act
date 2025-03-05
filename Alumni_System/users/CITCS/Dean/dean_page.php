<?php
    include ("../../../includes/header.php");
    include ("../../../config/app.php");
    
?>
<body>
    <?php
        include ("../../../includes/nav.php");
    ?>
    <h1 class="text-lg text-center mx-9 font-bold p-4">Dean's Page</h1>
    <h2 class="text-md text-left mx-3 font-medium p-2">List of Students</h2>

    <?php
        $query = "SELECT
            users.alumni_id,
            users.lastname,
            users.firstname,
            users.middlename,
            users.gender,
            users.birthday,
            users.email,
            users.contact_no,
            users.address,
            users.uname,
            users_info.alumni_id,
            users_info.college,
            users_info.program,
            users_info.year_graduated,
            users_info.section,
            users_info.work_status 
        FROM users INNER JOIN users_info
        ON users.alumni_id = users_info.alumni_id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='overflow-x-auto'>";
            echo "<table class='min-w-full divide-y divide-gray-200'>";
            echo "<thead class='bg-green-900 '>
            <tr>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Alumni Id</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Lastname</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Firstname</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Address</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Program</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Year Graduated</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Section</th>
            <th class='px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider'>Work Status</th>
            </tr>
            </thead>";
            echo "<tbody class='bg-white divide-y divide-gray-200'>";
            while ($row = mysqli_fetch_assoc($result)) {
            if ($row['alumni_id'] != 0) {
            echo "<tr class='hover:bg-gray-100'>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row['alumni_id'] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row['lastname'] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row['firstname'] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>". $row["address"] ."</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["program"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["year_graduated"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["section"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["work_status"] . "</td>";
            echo "</tr>";
            }
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "No users found.";
        }
        ?>
</body>
</html>