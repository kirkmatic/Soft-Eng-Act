<?php
include ("../../includes/header.php");
include ("../../config/app.php");

// Pagination settings
$limit = 10; // Number of rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Capture filter values
$yearFilter = isset($_GET['year']) ? mysqli_real_escape_string($conn, $_GET['year']) : "";
$batchFilter = isset($_GET['batch']) ? mysqli_real_escape_string($conn, $_GET['batch']) : "";
$programFilter = isset($_GET['program']) ? mysqli_real_escape_string($conn, $_GET['program']) : "";

// Construct WHERE conditions
$whereClauses = [];
if (!empty($yearFilter)) {
    $whereClauses[] = "sb.year_graduated = '$yearFilter'";
}
if (!empty($batchFilter)) {
    $whereClauses[] = "sb.batch_name = '$batchFilter'";
}
if (!empty($programFilter)) {
    $whereClauses[] = "sb.program = '$programFilter'";
}

// Build WHERE clause for query
$whereSQL = !empty($whereClauses) ? " WHERE " . implode(" AND ", $whereClauses) : "";

// Count total records with filters
$countQuery = "SELECT COUNT(*) AS total FROM students_table AS s 
               JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id 
               $whereSQL";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $limit);

// Fetch students with pagination and filters
$query = "SELECT s.alumni_id, s.lastname, s.firstname, s.middlename, sb.year_graduated, sb.batch_name, sb.program 
          FROM students_table AS s 
          JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id 
          $whereSQL
          LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
?>

<body>
    <?php include('registrar_navigation.php'); ?>

    <!-- Filters -->
    <div class="flex space-x-3">
        <form method="GET" class="flex space-x-3">
            <select name="year" id="yearFilter" class="p-2 border-2 text-lg border-green-900 rounded" onchange="this.form.submit()">
                <option value="">Select Year</option>
                <?php
                $yearQuery = "SELECT DISTINCT year_graduated FROM students_background_table ORDER BY year_graduated DESC";
                $yearResult = mysqli_query($conn, $yearQuery);
                while ($row = mysqli_fetch_assoc($yearResult)) {
                    $selected = ($yearFilter == $row['year_graduated']) ? "selected" : "";
                    echo "<option value='{$row['year_graduated']}' $selected>{$row['year_graduated']}</option>";
                }
                ?>
            </select>

            <select name="batch" id="batchFilter" class="p-2 border-2 text-lg border-green-900 rounded" onchange="this.form.submit()">
                <option value="">Select Batch</option>
                <?php
                $batchQuery = "SELECT DISTINCT batch_name FROM students_background_table ORDER BY batch_name ASC";
                $batchResult = mysqli_query($conn, $batchQuery);
                while ($row = mysqli_fetch_assoc($batchResult)) {
                    $selected = ($batchFilter == $row['batch_name']) ? "selected" : "";
                    echo "<option value='{$row['batch_name']}' $selected>{$row['batch_name']}</option>";
                }
                ?>
            </select>

            <select name="program" id="programFilter" class="p-2 border-2 text-lg border-green-900 rounded" onchange="this.form.submit()">
                <option value="">Select Program</option>
                <?php
                $programQuery = "SELECT DISTINCT program FROM students_background_table ORDER BY program ASC";
                $programResult = mysqli_query($conn, $programQuery);
                while ($row = mysqli_fetch_assoc($programResult)) {
                    $selected = ($programFilter == $row['program']) ? "selected" : "";
                    echo "<option value='{$row['program']}' $selected>{$row['program']}</option>";
                }
                ?>
            </select>
        </form>
    </div>
            <!-- Student Table -->
            <div class="mt-6 overflow-x-auto">
                <h2 class="text-md text-left font-medium p-2">List of Alumni Students</h2>
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                                <thead>
                            <tr class="bg-green-700 text-white">
                                <th class="px-4 py-2 border">Alumni ID</th>
                                <th class="px-4 py-2 border">Lastname</th>
                                <th class="px-4 py-2 border">Firstname</th>
                                <th class="px-4 py-2 border">Middlename</th>
                                <th class="px-4 py-2 border">Year Graduated</th>
                                <th class="px-4 py-2 border">Batch Name</th>
                                <th class="px-4 py-2 border">Program</th>
                                <th class="px-4 py-2 border">Action</th> <!-- New column -->
                            </tr>
                        </thead>
                        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='border-b text-center'>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['alumni_id']) . "</td>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['middlename']) . "</td>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['year_graduated']) . "</td>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['batch_name']) . "</td>";
                    echo "<td class='px-4 py-2 border'>" . htmlspecialchars($row['program']) . "</td>";
                    echo "<td class='px-4 py-2 border'>
                            <button class='updateBtn bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700 transition' 
                                data-id='" . $row['alumni_id'] . "' 
                                data-lastname='" . htmlspecialchars($row['lastname']) . "' 
                                data-firstname='" . htmlspecialchars($row['firstname']) . "' 
                                data-middlename='" . htmlspecialchars($row['middlename']) . "' 
                                data-year='" . htmlspecialchars($row['year_graduated']) . "' 
                                data-batch='" . htmlspecialchars($row['batch_name']) . "' 
                                data-program='" . htmlspecialchars($row['program']) . "'>
                                Update
                            </button>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center py-4 text-gray-500'>No students found</td></tr>";
            }
            ?>
            <?php include('../../modals/update_studentModal.php'); ?>
        </tbody>
        </table>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo ($page - 1) . "&year=$yearFilter&batch=$batchFilter&program=$programFilter"; ?>" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                Previous
            </a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i . "&year=$yearFilter&batch=$batchFilter&program=$programFilter"; ?>" 
            class="px-4 py-2 rounded transition 
                    <?php echo ($i == $page) 
                        ? 'bg-green-900 text-white font-bold border border-green-900 shadow-lg' 
                        : 'bg-gray-300 hover:bg-gray-400'; ?>">
                    <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo ($page + 1) . "&year=$yearFilter&batch=$batchFilter&program=$programFilter"; ?>" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                Next
            </a>
        <?php endif; ?>
    </div>

    </div>
</body>
<script src="../../scripts/open_update_modal.js">
</script>

</html>
