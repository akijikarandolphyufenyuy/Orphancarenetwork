function searchInput() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const hospitals = document.querySelectorAll(".hospital");
    let found = false;

    hospitals.forEach(function(hospital) {
        const hospitalName = hospital.querySelector("h3").textContent.toLowerCase();
        if (hospitalName.includes(input)) {
            hospital.style.display = "block";
            found = true;
        } else {
            hospital.style.display = "none";
        }
    });

    document.getElementById("noResult").style.display = found ? "none" : "block";
}