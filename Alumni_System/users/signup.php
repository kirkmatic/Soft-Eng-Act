<?php
    include ("../includes/header.php");
    include ("../backend/signup_handler.php");
?>
<body class="bg-gray-100 flex items-center justify-center h-screen font-[poppins]" style="background-image: url('../assets/bg.jpg'); background-size: cover; background-position: center;"></body>
    <!-- Sign Up Form container -->
    <div class="w-full md:w-2/3 lg:w-1/2 bg-white rounded-xl shadow-lg p-8">
        <p class="text-2xl font-bold mb-4">Register with your personal details</p>
        <form class="flex flex-col w-full" action="../backend/signup_handler.php" method="POST">
            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/2 px-2">
                    <label for="access" class="mb-2 text-sm font-semibold">Access</label>
                    <select id="access" name="access" required class="block w-full p-2 border rounded">
                        <option value="CITCS">CITCS</option>
                        <option value="CCJ">CCJ</option>
                        <option value="CTE">CTE</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label for="uname" class="mb-2 text-sm font-semibold">Uname</label>
                    <select id="uname" name="uname" required class="block w-full p-2 border rounded" onchange="toggleAlumniId()">
                        <option value="Dean">Dean</option>
                        <option value="ACT">ACT</option>
                        <option value="IT">IT</option>
                        <option value="CS">CS</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap -mx-2 mb-4" id="alumniIdContainer">
                <div class="w-full md:w-1/2 px-2">
                    <label for="alumni_id" class="mb-2 text-sm font-semibold">Alumni ID</label>
                    <input type="int" id="alumni_id" name="alumni_id" class="block w-full p-2 border rounded">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label for="gender" class="mb-2 text-sm font-semibold">Gender</label>
                    <select id="gender" name="gender" required class="block w-full p-2 border rounded">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/2 px-2">
                    <label for="lastname" class="mb-2 text-sm font-semibold">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required class="block w-full p-2 border rounded">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label for="firstname" class="mb-2 text-sm font-semibold">First Name</label>
                    <input type="text" id="firstname" name="firstname" required class="block w-full p-2 border rounded">
                </div>
            </div>

            <label for="middlename" class="mb-2 text-sm font-semibold">Middle Name</label>
            <input type="text" id="middlename" name="middlename" class="block w-full mb-4 p-2 border rounded">

            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/2 px-2">
                    <label for="birthday" class="mb-2 text-sm font-semibold">Birthday</label>
                    <input type="date" id="birthday" name="birthday" required class="block w-full p-2 border rounded">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label for="address" class="mb-2 text-sm font-semibold">Address</label>
                    <input type="text" id="address" name="address" required class="block w-full p-2 border rounded">
                </div>
            </div>

            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/2 px-2">
                    <label for="email" class="mb-2 text-sm font-semibold">Email</label>
                    <input type="email" id="email" name="email" required class="block w-full p-2 border rounded">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label for="contact_no" class="mb-2 text-sm font-semibold">Contact No.</label>
                    <input type="int" id="contact_no" name="contact_no" required class="block w-full p-2 border rounded">
                </div>
            </div>
            
            <label for="password" class="mb-2 text-sm font-semibold">Password</label>
            <input type="password" id="password" name="password" required class="block w-full mb-4 p-2 border rounded">

            <input type="submit"name="register_btn" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-900 text-xl text-white p-2 rounded-xl hover:bg-grey-200 transition font-semibold mb-2 cursor-pointer">

        </form>
        <p class="text-center">Have an account? <a class="font-semibold text-indigo-900" href="login.php">Login</a></p>
    </div>

    <script src="../scripts/signup.js">
    </script>
</body>
</html>