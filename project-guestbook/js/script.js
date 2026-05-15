AOS.init();

function toggleMenu() {
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("overlay").classList.toggle("active");
}

document.getElementById("search").addEventListener("keyup", function() {
    let keyword = this.value;

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
        }
    };

    xhr.open("GET", "search.php?keyword=" + keyword, true);
    xhr.send();
});
document.addEventListener("DOMContentLoaded", function () {
    const icons = document.querySelectorAll(".status-icon");

    icons.forEach(icon => {
        const status = icon.textContent.trim();

        if (status === "Check") {
            icon.style.color = "green";
            icon.style.background = "#d9e1d1";
            icon.style.border = "2px solid #b6c1aa";
        } 
        else if (status === "Close") {
            icon.style.color = "red";
            icon.style.background = "#ffbaba";
            icon.style.border = "2px solid #f4b0b0";
        } 
        else {
            icon.style.color = "#202020";
            icon.style.background = "#b8b3b0";
            icon.style.border = "2px solid #808080";
        }
    });
});