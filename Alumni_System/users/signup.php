<?php
    include ("../includes/header.php");
    include ("../backend/signup_handler.php");
?>

<body class="bg-gray-100 flex items-center justify-center h-screen font-[poppins]" style="background-image: url('../assets/background 1.png'); background-size: cover; background-position: center;">

    <!-- Central Container -->
    <div class="w-full md:w-2/3 lg:w-1/2 bg-white rounded-xl shadow-lg relative flex flex-col md:flex-row items-stretch">
        <!-- Toggle Panel -->
        <div class="w-full md:w-1/2 bg-gradient-to-b from-green-500 to-green-900 text-white flex flex-col items-center justify-center py-20 rounded-tl-xl rounded-bl-xl flex-1">
            <img src="../assets/1.png" alt="University Logo" class="w-27 h-auto mx-auto mb-4">
            <h1 class="text-2xl font-bold mb-2">Welcome</h1>
            <h1 class="text-xl">PLMun Alumni System</h1>
        </div>
        
        <!-- Sign Up Form -->
        <div class="w-full md:w-1/2 px-6 flex flex-col items-center justify-center flex-1">
            <p class="mb-4 text-xl font-bold">Add User Account</p>
            <form class="flex flex-col w-full" action="../backend/signup_handler.php" method="POST">
                
                <!-- Access -->
                <label class="mb-1 text-sm font-semibold">Access</label>
                <select name="access" id="access" required 
                    class="block w-full mb-2 p-3 border border-green-900 rounded text-l">
                    <option value="Registrar">Registrar</option>
                    <option value="CITCS">CITCS</option>
                </select>
                
                <!-- Uname (Hidden for Registrar) -->
                <div id="unameContainer">
                    <label class="mb-1 text-sm font-semibold">Uname</label>
                    <select name="uname" required 
                        class="block w-full mb-2 p-3 border border-green-900 rounded text-l">
                        <option value="Dean">Dean</option>
                        <option value="ACT">ACT</option>
                        <option value="IT">IT</option>
                        <option value="CS">CS</option>
                    </select>
                </div>

                <!-- User ID -->
                <label class="mb-1 text-sm font-semibold">User Id</label>
                <input name="user_id" type="int" required 
                    class="block w-full mb-2 p-3 border border-green-900 rounded text-l">

                <!-- Password -->
                <label class="mb-1 text-sm font-semibold">Password</label>
                <div class="relative w-full">
                    <input id="password" name="password" type="password" required 
                        class="block w-full mb-2 p-3 border border-green-900 rounded text-l pr-10">
                    <span id="togglePassword" 
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-green-900 cursor-pointer">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <!-- Confirm Password -->
                <label class="mb-1 text-sm font-semibold">Confirm Password</label>
                <input name="confirm_password" type="password" required 
                    class="block w-full mb-2 p-3 border border-green-900 rounded text-l">

                <!-- Submit Button -->
                <input type="submit" name="register_btn" 
                    class="w-full bg-gradient-to-r from-green-600 to-green-900 text-white p-3 rounded-lg 
                    hover:bg-gray-200 transition font-semibold mb-2 cursor-pointer text-l">
            </form>
            
            <!-- Login Link -->
            <p class="text-sm mb-2">Already have an Account? 
                <a class="font-semibold text-green-900" href="login.php">Login</a>
            </p>
        </div>
    </div>

</body>
<script src="../scripts/signup.js"></script>
</html>
