document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript loaded successfully!");

    // 🟢 Fix: Ensure elements exist before accessing them
    const accessDropdown = document.getElementById("access");
    const unameContainer = document.getElementById("unameContainer");
    const passwordInput = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    if (!accessDropdown || !unameContainer) {
        console.error("Error: #access or #unameContainer not found in the HTML!");
        return; // Stop script execution if these are missing
    }

    // Toggle Uname visibility based on Access selection
    function toggleUname() {
        console.log("Access changed to:", accessDropdown.value);
        unameContainer.style.display = accessDropdown.value === "Registrar" ? "none" : "block";
    }

    accessDropdown.addEventListener("change", toggleUname);
    toggleUname(); // Run on page load

    // 🟢 Fix: Ensure password toggle elements exist
    if (passwordInput && togglePassword) {
        togglePassword.addEventListener("click", function () {
            console.log("Toggling password visibility");
            const isPassword = passwordInput.type === "password";
            passwordInput.type = isPassword ? "text" : "password";

            // Toggle icon
            togglePassword.innerHTML = isPassword 
                ? '<i class="fas fa-eye-slash"></i>' 
                : '<i class="fas fa-eye"></i>';
        });
    } else {
        console.error("Error: Password toggle elements not found!");
    }
});
