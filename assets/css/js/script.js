// =====================================================
// assets/js/script.js
// Project RBAC Secure
// =====================================================

// Confirm hapus data
function konfirmasiHapus(url) {
    let tanya = confirm("Yakin ingin menghapus data ini?");
    if (tanya) {
        window.location.href = url;
    }
}

// Alert otomatis hilang
setTimeout(function () {
    let alertBox = document.querySelectorAll('.alert');

    alertBox.forEach(function(item){
        item.style.transition = "0.5s";
        item.style.opacity = "0";

        setTimeout(function(){
            item.remove();
        },500);
    });

}, 3000);

// Jam realtime navbar
function tampilJam() {
    let jam = document.getElementById("jam");

    if (jam) {
        let now = new Date();

        let h = String(now.getHours()).padStart(2, '0');
        let m = String(now.getMinutes()).padStart(2, '0');
        let s = String(now.getSeconds()).padStart(2, '0');

        jam.innerHTML = h + ":" + m + ":" + s;
    }
}

setInterval(tampilJam, 1000);

// Preview password show/hide
function togglePassword(idInput) {
    let x = document.getElementById(idInput);

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// Highlight menu aktif otomatis
document.addEventListener("DOMContentLoaded", function () {
    let links = document.querySelectorAll(".sidebar a");
    let current = window.location.href;

    links.forEach(function(link){
        if (current === link.href) {
            link.classList.add("active");
        }
    });
});