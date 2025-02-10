function toggleAlumniId() {
    const uname = document.getElementById("uname").value;
    const alumniIdContainer = document.getElementById("alumniIdContainer");

    if (uname === "Dean") {
        alumniIdContainer.style.display = "none";
    } else {
        alumniIdContainer.style.display = "flex";
    }
}

// Initial check on page load
document.addEventListener("DOMContentLoaded", function() {
    toggleAlumniId();
});