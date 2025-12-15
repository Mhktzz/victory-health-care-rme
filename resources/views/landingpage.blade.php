<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Victory Healthcare Clinic</title>

    @vite('resources/css/app.css')

    {{-- Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#F3F5F6] text-[#286767] antialiased">

{{-- NAVBAR --}}
<nav class="sticky top-0 z-50 flex items-center justify-between px-10 py-6 bg-white shadow">
    <div class="flex items-center gap-3">
        {{-- Ganti path gambar sesuai lokasi logo Anda --}}
        <img src="/img/victorylogo.png" class="w-10 h-10"> 

        <div class="leading-tight">
            <p class="text-sm font-medium text-[#519D9E]">
                Victory Healthcare Clinic
            </p>
            <p class="text-xs text-gray-500">
                Sistem RME
            </p>
        </div>
    </div>

    {{-- Navigasi Halaman --}}
    <div class="hidden md:flex items-center gap-6 text-sm font-medium">
        <a href="#fitur" class="text-gray-600 hover:text-[#519D9E] transition">Fitur</a>
        <a href="#jam-kerja" class="text-gray-600 hover:text-[#519D9E] transition">Jam Kerja Klinik</a>
        <a href="#modul-rme" class="text-gray-600 hover:text-[#519D9E] transition">Modul Rekam Medis</a>
    </div>

    <div class="flex items-center gap-4">
        <a href="{{ route('login') }}"
           class="px-5 py-2 text-white bg-[#519D9E] rounded-lg hover:bg-[#286767] transition">
            Login
        </a>
    </div>
</nav>

{{-- HERO --}}
<section class="px-10 py-20">
    <div class="grid items-center max-w-6xl mx-auto grid-cols-1 gap-12 md:grid-cols-2">

        {{-- LEFT --}}
        <div>
            <span class="inline-block px-4 py-1 mb-4 text-sm font-medium text-[#519D9E] bg-[#E8F4F4] rounded-full">
                <i class="fas fa-wave-square mr-2"></i>Sistem Terpadu & Modern
            </span>

            <h1 class="mb-4 text-4xl font-bold leading-tight">
                Sistem Rekam Medis Elektronik<br>
                <span class="text-[#519D9E]">Victory Healthcare Clinic</span>
            </h1>

            <p class="mb-8 text-gray-600">
                Solusi lengkap untuk manajemen rekam medis digital dengan sistem multi-role
                yang terintegrasi untuk meningkatkan efisiensi operasional klinik Anda.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('login') }}"
                   class="flex items-center gap-2 px-6 py-3 font-semibold text-white bg-[#519D9E] rounded-lg hover:bg-[#286767] transition">
                    Masuk ke Sistem &rarr;
                </a>

                <a href="#fitur"
                   class="px-6 py-3 font-semibold text-[#519D9E] border border-[#519D9E] rounded-lg hover:bg-[#E8F4F4] transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex justify-center">
            {{-- Ganti path gambar sesuai lokasi hero image Anda --}}
            <div class="relative w-full max-w-md p-4 bg-white rounded-2xl shadow-xl">
                <div class="rounded-xl overflow-hidden shadow-inner">
                    <img src="/img/gambarkursi.png" alt="Interior Klinik"
                         class="object-cover w-full h-full">
                </div>
            </div>
        </div>

    </div>
</section>

{{-- FITUR UTAMA --}}
<section id="fitur" class="px-10 py-20 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="mb-2 text-3xl font-bold text-center text-[#286767]">
            Fitur Utama
        </h2>
        <p class="mb-12 text-center text-gray-600">
            Sistem RME yang dirancang khusus untuk memenuhi kebutuhan operasional Victory Healthcare Clinic
        </p>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

            {{-- Fitur 1: Sistem Multi-Role --}}
            <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mb-4 text-pink-600 bg-pink-100 rounded-full">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Sistem Multi-Role</h3>
                <p class="text-sm text-gray-600">6 role pengguna: Superadmin, Manajer Operasional, Admin Pendaftaran, Perawat, Dokter, dan Apoteker dengan hak akses berbeda.</p>
            </div>

            {{-- Fitur 2: Rekam Medis Digital --}}
            <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mb-4 text-teal-600 bg-teal-100 rounded-full">
                    <i class="fas fa-notes-medical"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Rekam Medis Digital</h3>
                <p class="text-sm text-gray-600">Pencatatan rekam medis elektronik lengkap dengan data subjektif, objektif, diagnosis (ICD-10), dan tindakan medis.</p>
            </div>

            {{-- Fitur 3: Manajemen Pasien --}}
            <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mb-4 text-indigo-600 bg-indigo-100 rounded-full">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Manajemen Pasien</h3>
                <p class="text-sm text-gray-600">Kelola 25+ data pasien dan reservasi untuk 4 layanan: Gigi, Umum, Anak, dan Fisioterapi.</p>
            </div>

            {{-- Fitur 4: Resep Digital --}}
            <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mb-4 text-orange-600 bg-orange-100 rounded-full">
                    <i class="fas fa-prescription-bottle-alt"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Resep Digital</h3>
                <p class="text-sm text-gray-600">Sistem resep digital terintegrasi dari dokter ke apoteker dengan tracking penyaluran obat real-time.</p>
            </div>

            {{-- Fitur 5: Monitoring & Laporan --}}
            <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mb-4 text-green-600 bg-green-100 rounded-full">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Monitoring & Laporan</h3>
                <p class="text-sm text-gray-600">Dashboard monitoring lengkap untuk manajer operasional dengan laporan aktivitas klinik real-time.</p>
            </div>

            {{-- Fitur 6: Alur Terintegrasi --}}
            <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mb-4 text-cyan-600 bg-cyan-100 rounded-full">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Alur Terintegrasi</h3>
                <p class="text-sm text-gray-600">Alur kerja seamless: Pendaftaran &rarr; Pemeriksaan Awal Perawat &rarr; Pemeriksaan Dokter &rarr; Penyaluran Obat.</p>
            </div>

        </div>
    </div>
</section>

{{-- KEUNGGULAN & GAMBAR RME --}}
<section class="px-10 py-20">
    <div class="grid items-center max-w-6xl mx-auto grid-cols-1 gap-12 md:grid-cols-2">

        {{-- LEFT (Gambar Alat Kesehatan / Monitor) --}}
        <div class="flex justify-center">
            {{-- Ganti path gambar sesuai lokasi gambar alat kesehatan/glucometer Anda --}}
            <div class="relative w-full max-w-md p-4 rounded-2xl" style="background-color: #F8F1F2;">
                <div class="flex items-center justify-center w-full h-full">
                    <img src="/img/gambar2.png" alt="Alat Kesehatan Digital"
                         class="object-contain w-3/4 p-4">
                </div>
            </div>
        </div>

        {{-- RIGHT (Poin-Poin Keunggulan) --}}
        <div>
            <h2 class="mb-6 text-3xl font-bold text-[#286767]">
                Teknologi Modern untuk Healthcare
            </h2>
            <p class="mb-8 text-gray-600">
                Sistem RME yang dibangun dengan teknologi terkini untuk memberikan
                pengalaman terbaik dalam pengelolaan rekam medis elektronik.
            </p>

            <ul class="space-y-4">
                <li class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-[#519D9E] mt-1"></i>
                    <p class="text-gray-700">Terpisah dari sistem kasir untuk fokus pada rekam medis</p>
                </li>
                <li class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-[#519D9E] mt-1"></i>
                    <p class="text-gray-700">Autentikasi multi-role dengan hak akses berbeda</p>
                </li>
                <li class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-[#519D9E] mt-1"></i>
                    <p class="text-gray-700">Interface yang mudah digunakan untuk semua user</p>
                </li>
                <li class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-[#519D9E] mt-1"></i>
                    <p class="text-gray-700">Data pasien tersimpan dengan aman dan terstruktur</p>
                </li>
                <li class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-[#519D9E] mt-1"></i>
                    <p class="text-gray-700">Alur kerja yang jelas dari pendaftaran hingga penyaluran obat</p>
                </li>
                <li class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-[#519D9E] mt-1"></i>
                    <p class="text-gray-700">Monitoring real-time untuk manajer operasional</p>
                </li>
            </ul>
        </div>

    </div>
</section>

{{-- JAM KERJA KLINIK --}}
<section id="jam-kerja" class="px-10 py-20 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="mb-2 text-3xl font-bold text-[#286767]">
            Jam Kerja Klinik
        </h2>
        <p class="mb-12 text-gray-600">
            Jadwal operasional klinik yang perlu diketahui oleh seluruh staff untuk koordinasi kerja yang optimal
        </p>

        <div class="flex flex-col items-center justify-center gap-8 md:flex-row">
            {{-- Senin - Sabtu --}}
            <div class="p-8 bg-white border border-gray-200 rounded-xl shadow-md w-full max-w-xs transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 text-teal-600 bg-teal-100 rounded-full">
                    <i class="far fa-clock"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Senin - Sabtu</h3>
                <p class="text-sm text-gray-600"><i class="far fa-clock mr-2"></i>09.00 - 13.00</p>
            </div>

            {{-- Minggu --}}
            <div class="p-8 bg-white border border-gray-200 rounded-xl shadow-md w-full max-w-xs transition hover:shadow-lg">
                <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 text-teal-600 bg-teal-100 rounded-full">
                    <i class="far fa-clock"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Minggu</h3>
                <p class="text-sm text-gray-600"><i class="far fa-clock mr-2"></i>09.00 - 17.00</p>
            </div>
        </div>

        <div class="p-4 mt-8 text-sm text-yellow-800 bg-yellow-100 rounded-lg max-w-xl mx-auto">
            <i class="fas fa-exclamation-triangle mr-2"></i>Catatan: Pastikan semua staff hadir sesuai jadwal shift masing-masing. Untuk informasi lebih lanjut, hubungi **Manajer Operasional**.
        </div>
    </div>
</section>

{{-- MODUL REKAM MEDIS ELEKTRONIK --}}
<section id="modul-rme" class="px-10 py-20">
    <div class="max-w-6xl mx-auto">
        <h2 class="mb-2 text-3xl font-bold text-center text-[#286767]">
            Modul Rekam Medis Elektronik
        </h2>
        <p class="mb-12 text-center text-gray-600">
            Sistem RME lengkap dengan modul-modul yang dirancang khusus untuk setiap role user
        </p>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">

            {{-- Modul Superadmin --}}
            <div class="p-6 bg-pink-50 border border-pink-200 rounded-xl shadow-md">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-8 h-8 text-pink-600 bg-pink-100 rounded-full">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Superadmin</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Pengguna & Fitur Login As</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Master Data Medis (ICD-10, Tindakan, Obat)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Rekam Medis</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Data Pasien</li>
                </ul>
            </div>

            {{-- Modul Manajer Operasional --}}
            <div class="p-6 bg-teal-50 border border-teal-200 rounded-xl shadow-md">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-8 h-8 text-teal-600 bg-teal-100 rounded-full">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Manajer Operasional</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Dashboard Monitoring Real-time</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Layanan (Gigi, Umum, Anak, Fisioterapi)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Laporan Aktivitas Klinik</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Analitik & Statistik Operasional</li>
                </ul>
            </div>

            {{-- Modul Admin Pendaftaran --}}
            <div class="p-6 bg-indigo-50 border border-indigo-200 rounded-xl shadow-md">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-8 h-8 text-indigo-600 bg-indigo-100 rounded-full">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Admin Pendaftaran</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Pasien (25+ Data Lengkap)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Reservasi (4 Layanan)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Kelola Status Kunjungan</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Auto-hitung Umur & Nomor Antrian</li>
                </ul>
            </div>

            {{-- Modul Perawat --}}
            <div class="p-6 bg-cyan-50 border border-cyan-200 rounded-xl shadow-md">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-8 h-8 text-cyan-600 bg-cyan-100 rounded-full">
                        <i class="fas fa-user-nurse"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Perawat</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Dashboard Ringkasan</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Antrian Pemeriksaan Awal</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Input Data Objektif (Vital Signs)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Tekanan Darah, Nadi, Suhu, RR, BB, TB</li>
                </ul>
            </div>

            {{-- Modul Dokter --}}
            <div class="p-6 bg-orange-50 border border-orange-200 rounded-xl shadow-md">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-8 h-8 text-orange-600 bg-orange-100 rounded-full">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Dokter</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Antrian Pasien & Ringkasan</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Input Data Subjektif (Anamnesa)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Diagnosis ICD-10 & Tindakan Medis</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Resep Digital & Lihat Data Objektif</li>
                </ul>
            </div>

            {{-- Modul Apoteker --}}
            <div class="p-6 bg-red-50 border border-red-200 rounded-xl shadow-md">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-8 h-8 text-red-600 bg-red-100 rounded-full">
                        <i class="fas fa-capsules"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Apoteker</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Antrian Resep Digital</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Manajemen Stok Obat</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Riwayat & Pelacakan Obat</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-[#519D9E] mr-2"></i>Penyaluran & Konfirmasi Obat</li>
                </ul>
            </div>

        </div>

        <div class="p-4 mt-12 text-center text-md font-semibold text-gray-700 bg-white rounded-xl shadow-lg inline-block mx-auto">
            <i class="fas fa-user-lock mr-2 text-[#519D9E]"></i>6 Role User dengan modul lengkap dan terintegrasi
        </div>

    </div>
</section>

{{-- CALL TO ACTION --}}
<section class="px-10 py-20 bg-[#286767]">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="mb-4 text-3xl font-bold text-white">
            Siap Menggunakan Sistem?
        </h2>
        <p class="mb-8 text-white/90">
            Akses sistem RME Victory Healthcare Clinic dan tingkatkan efisiensi operasional klinik Anda
        </p>
        <a href="{{ route('login') }}"
           class="inline-flex items-center gap-2 px-8 py-4 text-lg font-semibold text-[#286767] bg-white rounded-lg hover:bg-gray-100 transition">
            Masuk ke Sistem &rarr;
        </a>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-[#286767] py-12 text-white">
    <div class="max-w-6xl mx-auto px-10 grid grid-cols-1 gap-8 md:grid-cols-4">

        {{-- Kolom 1: Kontak & Alamat --}}
        <div>
            <div class="flex items-center gap-2 mb-4">
                <i class="fas fa-heartbeat text-xl text-white"></i>
                <span class="text-lg font-semibold">Victory Health Care</span>
            </div>
            <p class="text-sm mb-4 text-white/80">Jasa Pelayanan Kesehatan</p>

            <ul class="space-y-2 text-sm text-white/80">
                <li class="flex items-center"><i class="fas fa-phone-alt mr-2 w-4"></i>0877 9292 9191</li>
                <li class="flex items-center"><i class="fas fa-envelope mr-2 w-4"></i>victorydentalcare1@gmail.com</li>
                <li class="flex items-start"><i class="fas fa-user-md mr-2 w-4 mt-1"></i>dr. Gembong Satria M, M.Biomed</li>
                <li class="flex items-start"><i class="fas fa-map-marker-alt mr-2 w-4 mt-1"></i>Jl. Lesanpura No.02 Karangklesem, Kec. Purwokerto Selatan, Kab. Banyumas Jawa Tengah 53144</li>
            </ul>
        </div>

        {{-- Kolom 2: Fitur --}}
        <div>
            <h4 class="mb-4 text-base font-semibold border-b border-white/20 pb-2">Fitur</h4>
            <ul class="space-y-2 text-sm text-white/80">
                <li><a href="#fitur" class="hover:text-white transition">Multi-Role</a></li>
                <li><a href="#modul-rme" class="hover:text-white transition">Rekam Medis</a></li>
                <li><a href="#fitur" class="hover:text-white transition">Resep Digital</a></li>
                <li><a href="#fitur" class="hover:text-white transition">Monitoring</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Role --}}
        <div>
            <h4 class="mb-4 text-base font-semibold border-b border-white/20 pb-2">Role</h4>
            <ul class="space-y-2 text-sm text-white/80">
                <li>Superadmin</li>
                <li>Manajer</li>
                <li>Admin</li>
                <li>Dokter</li>
                <li>Apoteker</li>
            </ul>
        </div>

        {{-- Kolom 4: Alur Sistem --}}
        <div>
            <h4 class="mb-4 text-base font-semibold border-b border-white/20 pb-2">Alur Sistem</h4>
            <ul class="space-y-2 text-sm text-white/80">
                <li>Pendaftaran</li>
                <li>Pemeriksaan</li>
                <li>Resep</li>
                <li>Penyaluran Obat</li>
                <li>Monitoring</li>
            </ul>
        </div>

    </div>

    {{-- Copyright --}}
    <div class="mt-10 pt-6 border-t border-white/10 text-center text-sm text-white/60">
        &copy; {{ date('Y') }} Victory Health Care. All rights reserved.
    </div>
</footer>

{{-- Script untuk smooth scroll jika diperlukan (Opsional) --}}
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId.length > 1) { // Hanya untuk link selain '#'
                e.preventDefault();
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

</body>
</html>