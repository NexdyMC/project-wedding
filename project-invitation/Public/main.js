document.addEventListener('DOMContentLoaded', function() {
    const btnGif = document.getElementById('button-gif');
    const cardBank = document.getElementById('card-bank');
    const toast = document.getElementById("toast");

    // Route Direct
    const routes = {
        bca: "https://www.bca.co.id",
        bri: "https://bri.co.id",
        dana: "https://www.dana.id",
        gopay: "https://www.gojek.com/gopay/",
        ovo: "https://www.ovo.id"
    };
    
    
     // Show/Hide Card Bank
    if (btnGif && cardBank) {
        btnGif.addEventListener('click', function(e) {
            e.preventDefault(); 
            if (cardBank.style.display === "none" || cardBank.style.display === "") {
                cardBank.style.display = "block";
                this.textContent = "Close Gifs";
            } else {
                cardBank.style.display = "none";
                this.textContent = "Send Gifs";
            }
        });
    }

    // Fungsi notif
    function showToast() {
        if (toast) {
            toast.classList.add("show");
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        }
    }

    document.querySelectorAll('.card').forEach((card) => {
        card.addEventListener('click', function () {
            const paymentType = this.getAttribute('data-payment');
            const spans = this.querySelectorAll('span');

            if (!spans[1]) return;

            const number = spans[1].innerText;

            // Salin Nomor
            navigator.clipboard.writeText(number).then(() => {
                // load notif
                showToast();

                // Direct link
                if (routes[paymentType]) {
                    setTimeout(() => {
                        window.open(routes[paymentType], '_blank');
                    }, 1000);
                }
            }).catch(err => {
                console.error('Gagal menyalin: ', err);
            });
        });
    });

    // Dropdown RSVP
    const dropdown = document.querySelector(".dropdown");
    const selected = document.querySelector(".dropdown-selected");
    const options = document.querySelectorAll(".option");
    const attendanceInput = document.getElementById("attendance");

    if (dropdown && selected) {
        selected.addEventListener("click", () => {
            dropdown.classList.toggle("active");
        });

        options.forEach(option => {
            option.addEventListener("click", () => {
                selected.textContent = option.textContent;
                if(attendanceInput) {
                    attendanceInput.value = option.getAttribute("data-value");
                }
                dropdown.classList.remove("active");
            });
        });

        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove("active");
            }
        });
    }
    

const rsvpForm = document.querySelector(".rsvp-section");

if (rsvpForm) {

    rsvpForm.addEventListener("submit", async function (e) {

        // Mencegah reload halaman
        e.preventDefault();

        // Ambil tombol submit
        const submitButton = this.querySelector("button");

        // Disable tombol sementara
        submitButton.disabled = true;
        submitButton.innerText = "Sending...";


        // ambil data FORM

        const formData = new FormData(this);

        try {

            // Kirim ke PHP
            const response = await fetch("rsvp.php", {
    method: "POST",
    body: formData
});

// const result = await response.json();


// untuk lihat error di log
const text = await response.text();
console.log(text);
const result = JSON.parse(text);
// untuk lihat error di log
console.log(result);

if (result.status === "success") {

    alert(result.message);

    this.reset();

    const selected = document.querySelector(".dropdown-selected");

    if (selected) {
        selected.innerText = "Confirmation of Attendance";
    }

} else {

    alert(result.message);

}

        } catch (error) {

            console.error(error);

            alert(error);
console.error(error);

        }

        submitButton.disabled = false;
        submitButton.innerText = "Send";

    });

}


    // COUNTDOWN TIMER ACARA

    // Tanggal acara
    const targetDate = new Date("May 21, 2026 10:00:00").getTime();

    // Function update countdown = bagian nu matak lier
    
    
    function updateCountdown() {

        // Waktu sekarang
        const now = new Date().getTime();

        // Selisih waktu
        const distance = targetDate - now;

        // Hari
        const days = Math.floor(
            distance / (1000 * 60 * 60 * 24)
        );

        // Jam
        const hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24))
            / (1000 * 60 * 60)
        );

        // Menit
        const minutes = Math.floor(
            (distance % (1000 * 60 * 60))
            / (1000 * 60)
        );


        // Detik
        const seconds = Math.floor(
            (distance % (1000 * 60))
            / 1000
        );

        // Get element HTML
        const dayEl = document.getElementById("days");
        const hourEl = document.getElementById("hours");
        const minuteEl = document.getElementById("minutes");
        const secondEl = document.getElementById("seconds");

        // Update angka ke HTML
        if (dayEl) dayEl.innerText = formatTime(days);
        if (hourEl) hourEl.innerText = formatTime(hours);
        if (minuteEl) minuteEl.innerText = formatTime(minutes);
        if (secondEl) secondEl.innerText = formatTime(seconds);

        // Jika countdown selesai
        if (distance < 0) {

            clearInterval(interval);

            if (dayEl) dayEl.innerText = "00";
            if (hourEl) hourEl.innerText = "00";
            if (minuteEl) minuteEl.innerText = "00";
            if (secondEl) secondEl.innerText = "00";
        }
    }

    // Tambahkan angka 0 di depan
    function formatTime(time) {
        return time < 10 ? `0${time}` : time;
    }

    // Jalankan pertama kali
    updateCountdown();

    // Update tiap detik
    const interval = setInterval(updateCountdown, 1000);




    // Gugel kalender

    const calendarBtn = document.getElementById("calendarBtn");

    if (calendarBtn) {

        // data
        const title = "Wedding Event";
        const details = "Akad Nikah Villa Agung";
        const location = "Villa Agung Bandung";

        // WIB 10:00 = UTC 03:00
        const startDate = "20260521T030000Z";

        // WIB 13:00 = UTC 06:00
        const endDate = "20260521T060000Z";

        const calendarUrl =
            `https://calendar.google.com/calendar/render?action=TEMPLATE` +
            `&text=${encodeURIComponent(title)}` +
            `&dates=${startDate}/${endDate}` +
            `&details=${encodeURIComponent(details)}` +
            `&location=${encodeURIComponent(location)}`;

        // Masukkan link ke button
        calendarBtn.href = calendarUrl;

        // Buka tab baru
        calendarBtn.target = "_blank";
    }


// LOAD COMMENT

const commentList = document.getElementById("commentList");

async function loadComments() {

    if (!commentList) return;

    try {

        const response = await fetch("get_comment.php");

        const comments = await response.json();

        commentList.innerHTML = "";

        comments.forEach(comment => {

            commentList.innerHTML += `

            <div class="comment-item">

                <div class="comment-header">
                    <span class="comment-name">
                        ${comment.name}
                    </span>
                </div>

                <div class="comment-body">
                    <p class="comment-message">
                        ${comment.ucapan}
                    </p>
                </div>

                <div class="comment-footer">
                    <span class="comment-date">
                        ${comment.date}
                    </span>
                </div>

            </div>

            `;
        });

    } catch (error) {

        console.error(error);

    }
}

//Running 
loadComments();

setInterval(loadComments, 5000);


});