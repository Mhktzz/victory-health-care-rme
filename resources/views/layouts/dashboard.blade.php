<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#F3F5F6] text-gray-800">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-[#519D9E] text-white hidden md:flex flex-col">
            <div class="flex items-center justify-center h-20 border-b border-white/20">
                <img src="/img/victorylogo.png" class="w-12">
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">

                {{-- ================= SUPER ADMIN ================= --}}
                @if (auth()->user()->role === 'super_admin')
                    <a href="{{ route('dashboard.superadmin') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-home"></i> Dashboard
                    </a>

                    <a href="{{ route('dashboard.superadmin.kelolauser') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-users-cog"></i> Kelola User
                    </a>

                    <a href="{{ route('dashboard.superadmin.datapasien') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-user-injured"></i> Data Pasien
                    </a>

                    <a href="{{ route('dashboard.superadmin.rekammedis') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-notes-medical"></i> Rekam Medis
                    </a>

                    <p class="px-4 mt-4 text-xs tracking-wider uppercase text-white/70">
                        Master Data Medis
                    </p>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-book-medical"></i> ICD-10
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-pills"></i> Data Obat
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-stethoscope"></i> Data Layanan
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-user-md"></i> Data Dokter
                    </a>
                @endif

                {{-- ================= MANAJER ================= --}}
                @if (auth()->user()->role === 'manajer')
                    <a href="{{ route('dashboard.manajer') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-home"></i> Dashboard
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-user-injured"></i> Data Pasien
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-stethoscope"></i> Layanan
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-chart-line"></i> Performa Dokter
                    </a>
                @endif

                {{-- ================= PENDAFTARAN ================= --}}
                @if (auth()->user()->role === 'pendaftaran')
                    <a href="{{ route('dashboard.pendaftaran') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-home"></i> Dashboard
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-user-plus"></i> Manajemen Pasien
                    </a>
                @endif

                {{-- ================= PERAWAT ================= --}}
                @if (auth()->user()->role === 'perawat')
                    <a href="{{ route('dashboard.perawat') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-home"></i> Dashboard
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-heartbeat"></i> Input Vital Sign
                    </a>
                @endif

                {{-- ================= DOKTER ================= --}}
                @if (auth()->user()->role === 'dokter')
                    <a href="{{ route('dashboard.dokter') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-home"></i> Dashboard
                    </a>

                    <a href="{{ route('dashboard.dokter.queue')}}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-list-ol"></i> Antrian Pasien
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-history"></i> Riwayat Pasien
                    </a>
                @endif

                {{-- ================= APOTEKER ================= --}}
                @if (auth()->user()->role === 'apoteker')
                    <a href="{{ route('dashboard.apoteker') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-home"></i> Dashboard
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-prescription"></i> Daftar Resep
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-pills"></i> Stok Obat
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/20">
                        <i class="mr-3 fas fa-clock-rotate-left"></i> Riwayat Obat
                    </a>
                @endif

            </nav>


            <form method="POST" action="{{ route('logout') }}" class="p-4">
                @csrf
                <button class="w-full px-4 py-2 bg-red-600 rounded-lg hover:bg-red-700">
                    Logout
                </button>
            </form>
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="flex flex-col flex-1">

            {{-- TOPBAR --}}
            <header class="flex items-center justify-between h-16 px-6 bg-white shadow">
                <h1 class="text-lg font-semibold">@yield('page-title')</h1>

                <div class="flex items-center gap-3">
                    <span class="text-sm font-medium">
                        {{ auth()->user()->name }}
                    </span>
                    <i class="text-2xl text-gray-600 fas fa-user-circle"></i>
                </div>
            </header>

            {{-- PAGE CONTENT --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>

    @if(session('success'))
        <div id="toast-success" class="fixed right-6 bottom-6 bg-green-600 text-white px-4 py-3 rounded shadow-lg">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function(){
                const t = document.getElementById('toast-success');
                if(t){ t.style.transition = 'opacity 0.5s'; t.style.opacity = '0'; setTimeout(()=>t.remove(), 600); }
            }, 2500);
        </script>
    @endif

</body>

</html>
