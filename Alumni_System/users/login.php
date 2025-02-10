<?php
    include('../config/app.php');
    include('../includes/header.php');
?>
<body class="bg-gray-100 flex items-center justify-center h-screen" style="background-image: url('../assets/background.jpg'); background-size: cover; background-position: center;"></body>
    <!-- Central Container -->
    <div class="w-full md:w-2/3 lg:w-1/2 bg-white rounded-xl shadow-lg relative flex flex-col md:flex-row items-center justify-center">
        <!-- Login Form -->
        <div class="w-full md:w-1/2 px-8 flex flex-col items-center justify-center">
            <h1 class="text-3xl font-bold mb-2">Hello 
                <span><img src="../assets/hand.png" alt="" class="inline-block w-8 h-8 mb-2"></span>
            </h1>
            <p class="mx-2 text-m">Please login to your account.</p>
            <form class="flex flex-col w-full" action="../backend/login_handler.php" method="POST">
                <label class="mb-2 text-sm font-semibold">Access:</label>
                <select name="access" required class="block w-full mb-2 p-4 border rounded">
                    <option value="CITCS">CITCS</option>
                    <option value="CCJ">CCJ</option>
                    <option value="CTE">CTE</option>
                </select>

                <label class="mb-2 text-sm font-semibold">Ucode:</label>
                <select required name="ucode" class="block w-full mb-2 p-4 border rounded">
                    <option value="001">001</option>
                    <option value="002">002</option>
                    <option value="003">003</option>
                    <option value="004">004</option>
                </select>

                <label class="mb-2 text-sm font-semibold">Password:</label>
                <input name="password"type="password" required class="block w-full mb-2 p-4 border rounded">

                <button type="submit" name="login_btn" class="w-full bg-gradient-to-r from-green-400 to-green-700 text-xl text-white p-4 rounded-xl hover:bg-grey-200 transition font-semibold mb-2">Login</button>
            </form>
            <p>Don't have an Account? <a class="font-semibold text-green-700" href="signup.php">Sign up </a></p>
        </div>

        <!-- Toggle Panel -->
        <div class="w-full md:w-1/2 h-full bg-gradient-to-b from-green-400 to-green-700 text-white flex flex-col items-center justify-center transition-transform duration-500 py-20 rounded-tr-xl rounded-br-xl">
            <img src="../assets/logo.png" alt="University Logo" class="w-30 h-auto mx-auto mb-4">
            <h1 class="text-2xl font-bold mb-2">Welcome</h1>
            <h1 class="text-xl">Alumni System</h1>
            <button class="mt-4 px-6 py-2 text-green-50 border-solid border-2 border-green-50 rounded-xl" onclick="window.location.href='signup.php'">
            Register<i class="fa-regular fa-circle-right ml-2"></i>
            </button>
        </div>
    </div>
</body>
</html>
