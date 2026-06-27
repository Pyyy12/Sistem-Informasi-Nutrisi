<p align="center">
  <a href="#" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 🍽️ Kalkulator Gizi Makan Bergizi Gratis (MBG) - Laravel 11

Aplikasi berbasis web ini dirancang menggunakan **Laravel 11** dan **Tailwind CSS** untuk menghitung, mengevaluasi, serta mencatat kelayakan nutrisi dari kombinasi menu piring makan dalam program **Makan Bergizi Gratis (MBG)**. 

Sistem akan otomatis mengalkulasi total makronutrisi (Energi, Protein, Lemak, dan Karbohidrat) berdasarkan berat porsi (gram) yang diinput, lalu membandingkannya dengan standar Angka Kecukupan Gizi (AKG) sekali makan anak sekolah (Target: **≥ 550 kkal** dan **≥ 18g Protein**).

---

## 🚀 Fitur Utama
* **Master Data Bahan Pangan:** Menyimpan data kalori, protein, lemak, dan karbohidrat per 100 gram.
* **Kalkulator Nutrisi Dinamis:** Menghitung otomatis gizi berdasarkan variasi berat porsi (gram) yang ditentukan pengguna.
* **Validasi Standar MBG:** Otomatis menentukan status kelayakan menu (*"Memenuhi Standar MBG"* atau *"Belum Memenuhi Standar"*).
* **Log Riwayat Perhitungan:** Menampilkan 5 kalkulasi menu terakhir yang disimpan ke database.

---

## 🛠️ Spesifikasi & Teknologi
* **Framework:** Laravel 11 (PHP >= 8.2)
* **Database:** MySQL / PostgreSQL
* **Frontend:** Blade View + Tailwind CSS (via CDN)

---

## 💻 Langkah Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda:

### 1. Klon Repositori
```bash
git clone [https://github.com/username/nama-repositori.git](https://github.com/username/nama-repositori.git)
cd nama-repositori
