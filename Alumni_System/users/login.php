<?php
    include('../config/app.php');
    include('../includes/header.php');
?>
<body class=" flex items-center justify-center h-screen" style="background-image: url('../assets/background 1.png'); background-size: cover; background-position: center;"></body>
    <!-- Central Container -->
    <div class="w-full md:w-2/3 lg:w-1/2 bg-white rounded-xl shadow-lg relative flex flex-col md:flex-row items-center justify-center">
        
    <!-- Login Form -->
        <div class="w-full md:w-1/2 px-8 flex flex-col items-center justify-center animate__animated animate__fadeIn">
            <h1 class="text-3xl font-bold">Hello! 
            <span><img src="../assets/hand.png" alt="" class="inline-block w-8 h-8 mb-2"></span>
            </h1>
            <p class="mb-6 text-m">Please login your user account.</p>
            <form class="flex flex-col w-full" action="../backend/login_handler.php" method="POST">

                <label class="mb-2 text-sm font-semibold">User Id:</label>
                <input name="user_id" type="int" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">

                <label class="mb-2 text-sm font-semibold">Password:</label>
                <span class="flex items-center relative">
                    <input name="password" type="password" required 
                           class="block w-full mb-2 p-4 border-2 border-green-900 rounded" id="passwordInput">
                    <i class="fas fa-eye toggle-password absolute right-4 text-2xl text-green-900 cursor-pointer" id="togglePassword"></i>
                </span>

                <button type="submit" name="login_btn" class="w-full bg-gradient-to-r from-green-500 to-green-900 text-xl text-white p-4 rounded-xl hover:bg-grey-200 transition font-semibold mb-2">Login</button>
            </form>
            <!-- <p>Don't have an Account? <a class="font-semibold text-green-900" href="signup.php">Sign up </a></p> -->
        </div>

        <!-- Toggle Panel -->
        <div class="w-full md:w-1/2 h-full bg-gradient-to-b from-green-500 to-green-900 text-white flex flex-col items-center justify-center transition-transform duration-500 py-20 rounded-tr-xl rounded-br-xl">
            <img src="../assets/1.png" alt="University Logo" class="w-27 h-auto mx-auto mb-4">
            <h1 class="text-2xl font-bold mb-2">Welcome</h1>
            <h1 class="text-xl">PLMun Alumni System</h1>
        </div>
    </div>

    <script src="../scripts/signup.js">
    </script>
</body>
</html>
