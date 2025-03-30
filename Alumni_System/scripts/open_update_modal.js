document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("updateModal");
    const closeModal = document.getElementById("closeModal");
    const updateForm = document.getElementById("updateForm");

    // Event delegation for update buttons
    document.body.addEventListener("click", function (event) {
        if (event.target.classList.contains("updateBtn")) {
            const button = event.target;

            // Set form field values using data attributes
            document.getElementById("updateId").value = button.dataset.id || "";
            document.getElementById("updateLastname").value = button.dataset.lastname || "";
            document.getElementById("updateFirstname").value = button.dataset.firstname || "";
            document.getElementById("updateMiddlename").value = button.dataset.middlename || "";
            document.getElementById("updateYear").value = button.dataset.year || "";
            document.getElementById("updateBatch").value = button.dataset.batch || "";
            document.getElementById("updateProgram").value = button.dataset.program || "";

            modal.classList.remove("hidden");
        }
    });

    // Close modal event
    closeModal.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    // Form submission with AJAX
    updateForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(updateForm);

        fetch("/Alumni_System/backend/update_student.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())  // First, log raw response
        .then(data => {
            console.log("Server Response:", data); // Debugging
            try {
                let jsonData = JSON.parse(data); // Attempt to parse JSON
                if (jsonData.status === "success") {
                    alert("Student updated successfully!");
                    modal.classList.add("hidden");
                    location.reload(); 
                } else {
                    alert("Update failed: " + jsonData.message);
                }
            } catch (error) {
                console.error("JSON Parsing Error:", error);
                alert("Unexpected server response. Check console.");
            }
        })
        .catch(error => {
            console.error("Fetch Error:", error);
            alert("An error occurred while updating.");
        });
        
    });
});
