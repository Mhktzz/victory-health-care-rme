<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Victory Healthcare Clinic</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#F3F5F6] text-[#286767] antialiased">

{{-- NAVBAR --}}
<nav class="flex items-center justify-between px-10 py-6 bg-white shadow">
    <div class="flex items-center gap-3">
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
            <span class="inline-block px-4 py-1 mb-4 text-sm text-[#519D9E] bg-[#E8F4F4] rounded-full">
                Sistem Terpadu & Modern
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
                   class="flex items-center gap-2 px-6 py-3 text-white bg-[#519D9E] rounded-lg hover:bg-[#286767] transition">
                    Masuk ke Sistem →
                </a>

                <a href="#"
                   class="px-6 py-3 text-[#519D9E] border border-[#519D9E] rounded-lg hover:bg-[#E8F4F4] transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex justify-center">
            <img src="/img/landing-hero.png"
                 class="w-full max-w-md rounded-2xl shadow-lg">
        </div>

    </div>
</section>

{{-- FITUR --}}
<section class="py-20 bg-white">
    <h2 class="mb-10 text-2xl font-semibold text-center text-[#286767]">
        Fitur Utama
    </h2>
</section>

{{-- FOOTER --}}
<footer class="py-6 text-sm text-center text-gray-500 bg-[#F3F5F6]">
    © {{ date('Y') }} Victory Healthcare Clinic. All rights reserved.
</footer>

</body>
</html>
