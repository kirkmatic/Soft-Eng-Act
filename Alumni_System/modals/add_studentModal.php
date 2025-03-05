<!-- Student Modal -->
<div id="studentModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-5xl border-2 border-green-900 flex flex-col max-h-screen"> 
        <!-- Scrollable Content -->
        <div class="overflow-y-auto p-5 flex-1">
            <!-- Student Form -->
            <h2 class="text-lg font-bold text-green-900 mb-3">Student Details</h2>
            <form id="studentForm" action="/Alumni_System/backend/add_student.php" method="POST">
                <!-- Alumni ID -->
                <div class="mb-3">
                    <label class="text-sm font-medium">Alumni ID</label>
                    <input name="alumni_id" type="number" required class="block w-full p-2 border border-green-900 rounded">
                </div>

                <!-- Name Fields -->
                <div class="grid grid-cols-3 gap-3 mb-3">
                    <div>
                        <label class="text-sm font-medium">Last Name</label>
                        <input name="lastname" type="text" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                    <div>
                        <label class="text-sm font-medium">First Name</label>
                        <input name="firstname" type="text" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Middle Name</label>
                        <input name="middlename" type="text" class="block w-full p-2 border border-green-900 rounded">
                    </div>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label class="text-sm font-medium">Gender</label>
                    <select name="gender" required class="block w-full p-2 border border-green-900 rounded">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="text-sm font-medium">Address</label>
                    <input name="address" type="text" required class="block w-full p-2 border border-green-900 rounded">
                </div>

                <!-- Email & Contact -->
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="text-sm font-medium">Email</label>
                        <input name="email" type="email" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Contact</label>
                        <input name="contact" type="number" min="0" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                </div>

                <!-- Alumni Details -->
                <h2 class="text-lg font-bold text-green-900 mb-3">Alumni Details</h2>

                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="text-sm font-medium">Year Graduated</label>
                        <input name="year_graduated" type="number" min="1900" max="2099" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Batch Name</label>
                        <input name="batch_name" type="text" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3 mb-3">
                    <div>
                        <label class="text-sm font-medium">Department</label>
                        <input name="department" type="text" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Program</label>
                        <input name="program" type="text" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Section</label>
                        <input name="section" type="text" required class="block w-full p-2 border border-green-900 rounded">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="text-sm font-medium">Work Status</label>
                    <select name="work_status" required class="block w-full p-2 border border-green-900 rounded">
                        <option value="">Select</option>
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Modal Footer (Fixed Buttons) -->
        <div class="p-4 flex justify-end space-x-3 border-t">
        <button class="closeModal bg-red-600 text-white px-4 py-2 rounded text-sm font-medium hover:bg-red-800 transition">
            Cancel
        </button>
            <button type="submit" form="studentForm" name="add_student" class="bg-green-700 text-white px-4 py-2 rounded text-sm font-medium hover:bg-green-900 transition">Save</button>
        </div>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    document.getElementById('openModal').addEventListener('click', () => {
        document.getElementById('studentModal').classList.remove('hidden');
    });

    document.querySelectorAll('.closeModal').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('studentModal').classList.add('hidden');
    });
});

</script>
