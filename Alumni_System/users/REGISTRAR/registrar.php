<?php
include ("../../includes/header.php");
include ("../../config/app.php");

// Pagination settings
$limit = 10; // Number of rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Count total records
$countQuery = "SELECT COUNT(*) AS total FROM students_table AS s 
               JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $limit);

// Fetch students with pagination
$query = "SELECT s.alumni_id, s.lastname, s.firstname, s.middlename, sb.year_graduated, sb.batch_name, sb.program 
          FROM students_table AS s 
          JOIN students_background_table AS sb ON s.alumni_id = sb.alumni_id 
          LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
?>

<body>
    <?php include('../../includes/nav.php'); ?>

    <!-- Filters and Add Student Button -->
    <div class="flex justify-between items-center mt-6 bg-white p-4">
        <div class="flex space-x-3">
            <select id="yearFilter" class="p-2 border-2 text-lg border-green-900 rounded">
                <option value="">Select Year</option>
                <?php
                $yearQuery = "SELECT DISTINCT year_graduated FROM students_background_table ORDER BY year_graduated DESC";
                $yearResult = mysqli_query($conn, $yearQuery);
                while ($row = mysqli_fetch_assoc($yearResult)) {
                    echo "<option value='{$row['year_graduated']}'>{$row['year_graduated']}</option>";
                }
                ?>
            </select>

            <select id="batchFilter" class="p-2 border-2 text-lg border-green-900 rounded">
                <option value="">Select Batch</option>
                <?php
                $batchQuery = "SELECT DISTINCT batch_name FROM students_background_table ORDER BY batch_name ASC";
                $batchResult = mysqli_query($conn, $batchQuery);
                while ($row = mysqli_fetch_assoc($batchResult)) {
                    echo "<option value='{$row['batch_name']}'>{$row['batch_name']}</option>";
                }
                ?>
            </select>

            <select id="programFilter" class="p-2 border-2 text-lg border-green-900 rounded">
                <option value="">Select Program</option>
                <?php
                $programQuery = "SELECT DISTINCT program FROM students_background_table ORDER BY program ASC";
                $programResult = mysqli_query($conn, $programQuery);
                while ($row = mysqli_fetch_assoc($programResult)) {
                    echo "<option value='{$row['program']}'>{$row['program']}</option>";
                }
                ?>
            </select>
        </div>

        <button id="openModal" class="bg-green-700 text-white p-2 rounded-lg hover:bg-green-900 transition text-lg font-semibold">
            + Add Student
        </button>
    </div>

    <!-- Include Student Modal -->
    <?php include('../../modals/add_studentModal.php'); ?>

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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center py-4 text-gray-500'>No students found</td></tr>";
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

    </div>
</body>
</html>
