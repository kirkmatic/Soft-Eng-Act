<?php
    include ("../../../includes/header.php");
    include ("../../../config/app.php");
    // Pagination settings
    $limit = 10; // Number of rows per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Count total records for BSCS, BSIT, or ACT programs
    $countQuery = "SELECT COUNT(*) AS total FROM students_table AS s 
                JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id 
                WHERE sb.program IN ('BSCS', 'BSIT', 'ACT')";

    $result = mysqli_query($conn, $countQuery);
    $row = mysqli_fetch_assoc($result);
    $totalPages = ceil($row['total'] / $limit);

    // // Fetch students with program BSCS, BSIT, or ACT with pagination
    // $query = "SELECT s.alumni_id, s.lastname, s.firstname, s.middlename, sb.program 
    //     FROM students_table AS s 
    //     JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id 
    //     WHERE sb.program IN ('BSCS', 'BSIT', 'ACT') 
    //     LIMIT $limit OFFSET $offset";

?>
<body>
    <?php
        include ("bscs_navigation.php");
    ?>
    <h1 class="text-lg text-center font-bold p-2">BSCS Program Head Page</h1>
            <!-- Buttons -->
            <div class="flex p-4 justify-end">
        <button id="openModal" class="bg-green-700 text-white p-2 rounded-lg hover:bg-green-900 transition text-lg font-semibold">
            Add
        </button>
        </div>
        <!-- Include Student Modal -->
        <?php include('../../../modals/add_studentModal.php'); ?>
    <div class="mt-2 overflow-x-auto">
        <h2 class="text-md text-center font-medium">List of BSCS Alumni Students</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-green-700 text-white">
                    <th class="px-4 py-2 border">Alumni ID</th>
                    <th class="px-4 py-2 border">Lastname</th>
                    <th class="px-4 py-2 border">Firstname</th>
                    <th class="px-4 py-2 border">Middlename</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT s.alumni_id, s.lastname, s.firstname, s.middlename, sb.year_graduated, sb.batch_name, sb.program 
                        FROM students_table AS s 
                        JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id 
                        WHERE TRIM(sb.program) IN ('BSCS') 
                        LIMIT $limit OFFSET $offset";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query Failed: " . mysqli_error($conn));
                }

                // Check if rows exist
                $numRows = mysqli_num_rows($result);

                if ($numRows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='border-b text-center'>";
                        echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['alumni_id']) . "</td>";
                        echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['lastname']) . "</td>";
                        echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['firstname']) . "</td>";
                        echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['middlename']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p class='text-red-500'>No records found</p>";
                }

                ?>
            </tbody>
        </table>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo ($page - 1); ?>" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                Previous
            </a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" 
            class="px-4 py-2 rounded transition 
                    <?php echo ($i == $page) 
                        ? 'bg-green-900 text-white font-bold border border-green-900 shadow-lg' 
                        : 'bg-gray-300 hover:bg-gray-400'; ?>">
                    <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo ($page + 1); ?>" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                Next
            </a>
        <?php endif; ?>
    </div>
</body>
</html>