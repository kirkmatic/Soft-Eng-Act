<!-- Student Modal -->
<div id="studentModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-2xl border-2 border-green-900"> 
        <h2 class="text-2xl font-bold text-green-900 mb-6">Add Student</h2>

        <form action="../backend/add_student.php" method="POST">
            <!-- Alumni ID -->
            <div class="mb-4">
                <label class="text-lg font-semibold">Alumni ID</label>
                <input name="alumni_id" type="int" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
            </div>

            <!-- Last Name, First Name, Middle Name -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="text-lg font-semibold">Last Name</label>
                    <input name="lastname" type="text" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
                </div>
                <div>
                    <label class="text-lg font-semibold">First Name</label>
                    <input name="firstname" type="text" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
                </div>
                <div>
                    <label class="text-lg font-semibold">Middle Name</label>
                    <input name="middlename" type="text" class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-4">
                <label class="text-lg font-semibold">Gender</label>
                <select name="gender" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label class="text-lg font-semibold">Address</label>
                <input name="address" type="text" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
            </div>

            <!-- Email & Contact -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="text-lg font-semibold">Email</label>
                    <input name="email" type="email" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
                </div>
                <div>
                    <label class="text-lg font-semibold">Contact</label>
                    <input name="contact" type="int" required class="block w-full mb-2 p-4 border-2 border-green-900 rounded">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" id="closeModal" class="bg-red-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-red-800 transition ">Cancel</button>
                <button type="submit" name="add_student" class="bg-green-700 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-900 transition">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    document.getElementById('openModal').addEventListener('click', () => {
        document.getElementById('studentModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', () => {
        document.getElementById('studentModal').classList.add('hidden');
    });
</script>
