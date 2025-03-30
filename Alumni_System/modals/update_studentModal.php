<!-- update_studentModal.php -->
<div id="updateModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Update Student</h2>
        
        <form id="updateForm" action="/Alumni_System/backend/update_student.php" method="POST">
            <input type="hidden" id="updateId" name="alumni_id">
            
            <label class="block font-semibold">Lastname:</label>
            <input type="text" id="updateLastname" name="lastname" class="w-full p-2 border rounded mb-3" required>

            <label class="block font-semibold">Firstname:</label>
            <input type="text" id="updateFirstname" name="firstname" class="w-full p-2 border rounded mb-3" required>

            <label class="block font-semibold">Middlename:</label>
            <input type="text" id="updateMiddlename" name="middlename" class="w-full p-2 border rounded mb-3">

            <label class="block font-semibold">Year Graduated:</label>
            <input type="text" id="updateYear" name="year_graduated" class="w-full p-2 border rounded mb-3" required>

            <label class="block font-semibold">Batch Name:</label>
            <input type="text" id="updateBatch" name="batch_name" class="w-full p-2 border rounded mb-3" required>

            <label class="block font-semibold">Program:</label>
            <input type="text" id="updateProgram" name="program" class="w-full p-2 border rounded mb-3" required>

            <div class="flex justify-between">
                <button type="button" id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-green-700 text-white rounded">Save Changes</button>
            </div>
        </form>
    </div>
</div>
