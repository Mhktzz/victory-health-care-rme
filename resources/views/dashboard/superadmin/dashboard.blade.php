@extends('layouts.dashboard') {{-- Pastikan path ke layout utama Anda benar --}}

@section('title', 'Dashboard Super Admin')
@section('page-title', 'Dashboard')

@section('content')

    {{-- 4 STAT CARDS (Pasien Baru, Pasien Lama, Kunjungan, Total Users)--}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Card 1: Pasien Baru (Green)--}}
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Pasien Baru</p>
                <h2 class="text-3xl font-bold text-green-600 mt-1">45</h2>
                <p class="text-xs mt-1 text-green-500 font-semibold">Bulan ini <i class="fas fa-caret-up ml-1"></i> +12%</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full text-green-500">
                <i class="fas fa-user-plus text-xl"></i> 
            </div>
        </div>

        {{-- Card 2: Pasien Lama (Blue)--}}
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Pasien Lama</p>
                <h2 class="text-3xl font-bold text-blue-600 mt-1">328</h2>
                <p class="text-xs mt-1 text-cyan-500 font-semibold">Total this week <i class="fas fa-caret-up ml-1"></i> +12%</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-500">
                <i class="fas fa-user-friends text-xl"></i>
            </div>
        </div>

        {{-- Card 3: Jumlah Kunjungan (Orange)--}}
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Jumlah Kunjungan</p>
                <h2 class="text-3xl font-bold text-orange-600 mt-1">156</h2>
                <p class="text-xs mt-1 text-green-500 font-semibold">Bulan ini <i class="fas fa-caret-up ml-1"></i> +8%</p>
            </div>
            <div class="bg-orange-100 p-3 rounded-full text-orange-500">
                <i class="fas fa-calendar-alt text-xl"></i> 
            </div>
        </div>

        {{-- Card 4: Total Users (Pink)--}}
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Users</p>
                <h2 class="text-3xl font-bold text-pink-600 mt-1">11</h2>
                <p class="text-xs mt-1 text-green-500 font-semibold">Semua role this week <i class="fas fa-caret-up ml-1"></i> +0%</p>
            </div>
            <div class="bg-pink-100 p-3 rounded-full text-pink-500">
                <i class="fas fa-user-tie text-xl"></i> 
            </div>
        </div>
    </div>

    {{-- INFORMASI SISTEM & AKTIVITAS USER--}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        
        {{-- Column 1: Informasi Sistem--}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">Informasi Sistem</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">Versi Sistem</span>
                        <span class="font-medium text-gray-800">v1.0.0</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">Status Server</span>
                        <span class="font-semibold text-green-600">Online</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">Database</span>
                        <span class="font-semibold text-green-600">Connected</span>
                    </div>
                    <div class="flex justify-between items-center text-sm pt-3 border-t mt-4">
                        <span class="text-gray-600">Last Update</span>
                        <span class="font-medium text-gray-800">9 Desember 2024</span>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Column 2 & 3: Aktivitas User (Chart)--}}
        <div class="lg:col-span-2">
            <div class="bg-white p-6 rounded-xl shadow-md h-full flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">Aktivitas User</h3>
                
                {{-- Chart Placeholder (Gantilah ini dengan library Chart.js atau sejenisnya) --}}
                <div class="flex-1 min-h-[250px] relative">
                    {{--  --}}
                    <svg width="100%" height="100%" viewBox="0 0 800 300" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="areaGradient" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0%" stop-color="#20B2AA" stop-opacity="0.5"/>
                                <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        {{-- Placeholder Area Path --}}
                        <path d="M 40 180 C 140 100, 240 220, 340 160 C 440 60, 540 280, 640 140 C 740 220, 800 180 L 800 260 L 40 260 Z" fill="url(#areaGradient)" stroke="#20B2AA" stroke-width="2" fill-opacity="0.5"/>
                         {{-- X-Axis Labels --}}
                        <text x="80" y="275" font-size="10" fill="#666">Sen</text>
                        <text x="280" y="275" font-size="10" fill="#666">Rab</text>
                        <text x="380" y="275" font-size="10" fill="#666">Kam</text>
                        <text x="580" y="275" font-size="10" fill="#666">Sab</text>
                    </svg>
                </div>
                
                <div class="mt-4 text-sm text-gray-600 flex justify-between items-center border-t pt-2">
                    <span>Total Login Minggu Ini</span>
                    <span class="font-semibold text-gray-800">291 login</span>
                </div>
            </div>
        </div>
    </div>
    
    {{-- GRAFIK LAYANAN & OBAT--}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

        {{-- Card: Grafik Layanan Bulanan--}}
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">Grafik Layanan Bulan Ini</h3>
            
            {{-- Bar Chart Placeholder --}}
            <div class="flex items-end justify-around px-4 min-h-[250px]">
                {{--  --}}
                {{-- Bar 1: Konsultasi Umum --}}
                <div class="w-1/4 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-orange-600 w-full rounded-t-lg" style="height: 85%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Konsultasi Umum</span>
                </div>
                {{-- Bar 2: Konsultasi Gigi --}}
                <div class="w-1/4 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-orange-600 w-full rounded-t-lg" style="height: 40%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Konsultasi Gigi</span>
                </div>
                {{-- Bar 3: Konsultasi Anak --}}
                <div class="w-1/4 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-orange-600 w-full rounded-t-lg" style="height: 25%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Konsultasi Anak</span>
                </div>
            </div>
            
            <div class="mt-4 text-sm text-gray-600 flex justify-between border-t pt-2">
                <span>Total Layanan</span>
                <span class="font-semibold text-gray-800">156 layanan</span>
            </div>
        </div>

        {{-- Card: Grafik Obat Terlaris--}}
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">Grafik Obat Terlaris</h3>
            
            {{-- Bar Chart Placeholder --}}
            <div class="flex items-end justify-around px-4 min-h-[250px]">
                {{--  --}}
                {{-- Bar 1: Parasetamol --}}
                <div class="w-1/5 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-pink-600 w-full rounded-t-lg" style="height: 90%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Parasetamol</span>
                </div>
                {{-- Bar 2: Amoxicilin --}}
                <div class="w-1/5 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-pink-600 w-full rounded-t-lg" style="height: 55%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Amoxicilin</span>
                </div>
                {{-- Bar 3: Vitamin --}}
                <div class="w-1/5 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-pink-600 w-full rounded-t-lg" style="height: 48%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Vitamin</span>
                </div>
                {{-- Bar 4: Antibiotik --}}
                <div class="w-1/5 mx-2 flex flex-col items-center justify-end h-full">
                    <div class="bg-pink-600 w-full rounded-t-lg" style="height: 35%;"></div>
                    <span class="text-xs text-gray-600 mt-1 text-center">Antibiotik</span>
                </div>
            </div>
            
            <div class="mt-4 text-sm text-gray-600 flex justify-between border-t pt-2">
                <span>Total Obat Terdistribusi</span>
                <span class="font-semibold text-gray-800">373 unit</span>
            </div>
        </div>
    </div>


@endsection