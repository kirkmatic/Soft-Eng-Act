<?php
    include ("../../includes/header.php");
    include ("../../config/app.php");
    
?>
<body>
    <?php
        include('../../includes/nav.php');
    ?>
    <h1 class="text-lg text-center font-bold p-4">Registrar's Page</h1>
    <h2 class="text-md text-left font-medium p-2">List of Students</h2>

    <!-- Add Student Button -->
    <button id="openModal" class="bg-green-700 text-white p-2 rounded-lg hover:bg-green-900 transition font-semibold">
        + Add Student
    </button>

    <!-- Include Student Modal -->
    <?php include('../../modals/add_studentModal.php'); ?>



</body>
</html>