
<style> 
/* 1. Menyembunyikan Lingkaran Radio Bawaan */
.card-radio input[type="radio"] {
    display: none;
}

/* Container agar card berjajar ke samping */
.card-radio-container {
    display: flex;
    gap: 20px;
    max-width: 600px;
}

/* 2. Desain Dasar Card (Belum Dipilih) */
.card-radio label {
    display: flex;
    flex-direction: column;
    padding: 24px;
    border: 2px solid #e0e0e0;
    border-radius: 12px; /* Membuat sudut membulat/kotak modern */
    background-color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease; /* Efek transisi halus */
    color: #333333; /* Teks abu-abu gelap agar mudah dibaca */
}

/* 3. Efek Hover (Saat kursor diarahkan ke card) */
.card-radio label:hover {
    border-color: #ff6b9a;
    background-color: #fffafb; /* Warna latar belakang pink sangat pudar */
}

/* 4. Desain Saat Card Dipilih (:checked) */
.card-radio input[type="radio"]:checked + label {
    border-color: #ff4d8d; /* Warna garis tepi saat aktif */
    background-color: #ff4d8d; /* Warna latar saat aktif */
    color: #ffffff; /* Teks berubah menjadi PUTIH agar sangat terbaca */
    box-shadow: 0 8px 16px rgba(255, 77, 141, 0.25); /* Bayangan estetik */
}

/* --- Styling Teks di dalam Card --- */
.card-radio .title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 8px;
}

.card-radio .desc {
    font-size: 0.95rem;
    line-height: 1.5;
    opacity: 0.9; /* Sedikit transparan agar title lebih menonjol */
}
</style>
<div class="card-radio-container">
    
    <!-- Card Pilihan 1 -->
    <div class="card-radio">
        <!-- Radio disembunyikan lewat CSS nantinya -->
        <input type="radio" name="pilihan_paket" id="paket_standar" value="Standar" checked>
        
        <!-- Label bertindak sebagai Card -->
        <label for="paket_standar">
            <span class="title">Paket Standar</span>
            <span class="desc">Cocok untuk penggunaan personal sehari-hari.</span>
        </label>
    </div>

    <!-- Card Pilihan 2 -->
    <div class="card-radio">
        <input type="radio" name="pilihan_paket" id="paket_premium" value="Premium">
        <label for="paket_premium">
            <span class="title">Paket Premium</span>
            <span class="desc">Fitur lengkap dengan prioritas dukungan.</span>
        </label>
    </div>

</div>