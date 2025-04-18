<?php
    include ("../../../includes/header.php");
    include ("../../../config/app.php");
?>

<body>
    <?php include('act_navigation.php'); ?>
    <div class="container mx-auto p-6">

        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        
        <?php
        // Fetch total students count
        $student_count_query = "SELECT COUNT(*) as total_students FROM students_background_table WHERE program = 'ACT'";
        $result = mysqli_query($conn, $student_count_query);
        $row = mysqli_fetch_assoc($result);
        $total_students = $row['total_students'];
        
        // Fetch work status counts
        $work_status_query = "SELECT work_status, COUNT(*) as count FROM students_background_table WHERE program = 'ACT' GROUP BY work_status";
        $result = mysqli_query($conn, $work_status_query);
        $work_data = ["Employed" => 0, "Unemployed" => 0];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['work_status'];
            if ($status === "Employed" || $status === "Unemployed") {
                $work_data[$status] = $row['count'];
            }
        }
        
        // Count genders for CITCS students
        $gender_query = "SELECT s.gender, COUNT(*) as count 
                        FROM students_table s
                        JOIN students_background_table b ON s.alumni_id = b.alumni_id
                        WHERE b.program = 'ACT'
                        GROUP BY s.gender";
        $result = mysqli_query($conn, $gender_query);
        $gender_counts = ['Male' => 0, 'Female' => 0];

        while ($row = mysqli_fetch_assoc($result)) {
            $gender = ucfirst(strtolower($row['gender'])); // Normalize gender format
            if (array_key_exists($gender, $gender_counts)) {
                $gender_counts[$gender] = $row['count'];
            }
        }

        $work_data_json = json_encode(array_values($work_data));
        
        // Fetch program counts
        $program_query = "SELECT batch_name, COUNT(*) as count FROM students_background_table WHERE program = 'ACT' GROUP BY batch_name";
        $result = mysqli_query($conn, $program_query);
        
        $program_labels = [];
        $program_counts = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $program_labels[] = $row['batch_name'];
            $program_counts[] = $row['count'];
        }
        
        // Fetch graduation trends
        $grad_query = "SELECT year_graduated, COUNT(*) as count FROM students_background_table GROUP BY year_graduated ORDER BY year_graduated";
        $result = mysqli_query($conn, $grad_query);
        
        $grad_years = [];
        $grad_counts = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $grad_years[] = $row['year_graduated'];
            $grad_counts[] = $row['count'];
        }

        ?>
        
        <div class="flex justify-center">
    <div class="w-full max-w-6xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- First Column: Student Cards (Stacked) -->
            <div class="space-y-4">
                <!-- Total Students Card -->
                <div class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class="fas fa-users text-green-500 text-5xl mr-4"></i>
                    <div class="flex flex-col">
                        <h2 class="text-lg font-semibold">Total ACT Students</h2>
                        <h4 class="text-xl font-semibold"><?php echo $total_students; ?></h4>
                    </div>
                </div>

                <!-- Male Students Card -->
                <div class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class="fas fa-male text-blue-500 text-4xl mr-4"></i>
                    <div class="flex flex-col">
                        <h2 class="text-lg font-semibold">Male Students</h2>
                        <h4 class="text-xl font-semibold"><?php echo $gender_counts['Male']; ?></h4>
                    </div>
                </div>

                <!-- Female Students Card -->
                <div class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class="fas fa-female text-pink-500 text-4xl mr-4"></i>
                    <div class="flex flex-col">
                        <h2 class="text-lg font-semibold">Female Students</h2>
                        <h4 class="text-xl font-semibold"><?php echo $gender_counts['Female']; ?></h4>
                    </div>
                </div>
            </div>

            <!-- Second Column: Employment Status Chart -->
            <div class="bg-white p-4 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Employment Status</h2>
                <div class="flex justify-center" style="height: 300px;">
                    <canvas id="workStatusChart" style="max-width: 100%; height: 100%;"></canvas>
                </div>
            </div>

            <!-- Third Column: Students per Program Chart -->
            <div class="bg-white p-4 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Students per Batch</h2>
                <div class="flex justify-center" style="height: 300px;">
                    <canvas id="programChart" style="max-width: 100%; height: 100%;"></canvas>
                </div>
            </div>
            
        </div>
    </div>
</div>      
        <!-- Graduation Trends Chart -->
            <div class="bg-white p-4 shadow rounded-lg md:col-span-2"> <!-- Span 2 columns -->
                <h2 class="text-xl font-semibold mb-4">Students Graduated per Year</h2>
                <div class="flex justify-center" style="height: 300px;">
                    <canvas id="gradChart" style="max-width: 600px; height: 100%;"></canvas>
                </div>
            </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('workStatusChart').getContext('2d');
            var workStatusChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Employed', 'Unemployed'],
                    datasets: [{
                        data: <?php echo $work_data_json; ?>,
                        backgroundColor: ['#87A922', '#FCDC2A']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });

        var ctx2 = document.getElementById('programChart').getContext('2d');
        var programChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($program_labels); ?>,
                datasets: [{
                    label: 'Number of Students',
                    data: <?php echo json_encode($program_counts); ?>,
                    backgroundColor: '#87A922',
                    borderColor: '#87A922',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx3 = document.getElementById('gradChart').getContext('2d');
        var gradChart = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($grad_years); ?>,
                datasets: [{
                    label: 'Year Graduated',
                    data: <?php echo json_encode($grad_counts); ?>,
                    borderColor: '#FCDC2A',
                    backgroundColor: '#FFF67E',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>