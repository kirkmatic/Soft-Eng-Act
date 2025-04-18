<?php
    include ("../../../includes/header.php");
?>
    <nav class="bg-gradient-to-b from-green-500 from-50% to-green-900 to-50% p-4 mb-4">
        <ul class="flex justify-between items-center px-6">
            <li class="flex items-center">
                <img src="/Alumni_System/assets/1.png" alt="University Logo" class="w-12 h-auto">
                <h1 class="text-white text-xl font-bold ml-2">Welcome</h1>
            </li>
            <li>
                <ul class="flex space-x-6">
                    <li><a href="dean_dashboard.php" class="text-white hover:text-gray-400 text-lg">Dashboard</a></li>
                    <li><a href="dean_records.php" class="text-white hover:text-gray-400 text-lg">Student Info</a></li>
                    <li><a href="/Alumni_System/backend/logout_handler.php" class="text-white hover:text-gray-400 text-2xl"><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </li>
        </ul>
    </nav>
