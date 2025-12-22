@extends('layouts.dashboard')

@section('title', 'Dashboard Super Admin')
@section('page-title', 'Dashboard')

@section('content')

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">


        <div class="p-5 bg-white shadow-md rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pasien Baru</p>
                    <h2 class="text-3xl font-bold text-green-600">45</h2>
                </div>

                <div class="p-3 text-green-600 bg-green-100 rounded-full">
                    <i class="text-xl fas fa-user-plus"></i>
                </div>
            </div>


            <hr class="my-3 border-gray-200">

            <div class="flex items-center justify-between text-xs">
                <span class="flex items-center font-semibold text-green-500">
                    <i class="mr-1 fas fa-list"></i> Bulan ini
                </span>
                <span class="font-semibold text-green-600">
                    <i class="mr-1 fas fa-caret-up"></i> +12%
                </span>
            </div>
        </div>


        <div class="p-5 bg-white shadow-md rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pasien Lama</p>
                    <h2 class="text-3xl font-bold text-blue-600">328</h2>
                </div>

                <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                    <i class="text-xl fas fa-user-friends"></i>
                </div>
            </div>


            <hr class="my-3 border-gray-200">

            <div class="flex items-center justify-between text-xs">
                <span class="flex items-center font-semibold text-cyan-500">
                    <i class="mr-1 fas fa-list"></i> Minggu ini
                </span>
                <span class="font-semibold text-green-600">
                    <i class="mr-1 fas fa-caret-up"></i> +12%
                </span>
            </div>
        </div>


        <div class="p-5 bg-white shadow-md rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Jumlah Kunjungan</p>
                    <h2 class="text-3xl font-bold text-orange-600">156</h2>
                </div>

                <div class="p-3 text-orange-600 bg-orange-100 rounded-full">
                    <i class="text-xl fas fa-calendar-alt"></i>
                </div>
            </div>


            <hr class="my-3 border-gray-200">

            <div class="flex items-center justify-between text-xs">
                <span class="flex items-center font-semibold text-green-500">
                    <i class="mr-1 fas fa-list"></i> Bulan ini
                </span>
                <span class="font-semibold text-green-600">
                    <i class="mr-1 fas fa-caret-up"></i> +8%
                </span>
            </div>
        </div>


        <div class="p-5 bg-white shadow-md rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Users</p>
                    <h2 class="text-3xl font-bold text-pink-600">11</h2>
                </div>

                <div class="p-3 text-pink-600 bg-pink-100 rounded-full">
                    <i class="text-xl fas fa-user-tie"></i>
                </div>
            </div>


            <hr class="my-3 border-gray-200">

            <div class="flex items-center justify-between text-xs">
                <span class="flex items-center font-semibold text-gray-500">
                    <i class="mr-1 fas fa-list"></i> Semua role
                </span>
                <span class="font-semibold text-green-600">
                    <i class="mr-1 fas fa-minus"></i> 0%
                </span>
            </div>
        </div>

    </div>




    <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-3">


        <div class="p-6 bg-white shadow-md rounded-xl">
            <h3 class="pb-3 mb-4 text-lg font-semibold border-b">Informasi Sistem</h3>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Versi Sistem</span>
                    <span class="font-medium">v1.0.0</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Status Server</span>
                    <span class="font-semibold text-green-600">Online</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Database</span>
                    <span class="font-semibold text-green-600">Connected</span>
                </div>
                <div class="flex justify-between pt-3 mt-4 border-t">
                    <span class="text-gray-500">Last Update</span>
                    <span class="font-medium">9 Desember 2024</span>
                </div>
            </div>
        </div>


        <div class="p-6 bg-white shadow-md lg:col-span-2 rounded-xl">
            <h3 class="pb-3 mb-4 text-lg font-semibold border-b">Aktivitas User</h3>
            <div class="min-h-[260px]">
                <canvas id="userActivityChart"></canvas>
            </div>

            <div class="flex justify-between pt-2 mt-4 text-sm border-t">
                <span class="text-gray-500">Total Login Minggu Ini</span>
                <span class="font-semibold">291 login</span>
            </div>
        </div>

    </div>


    <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-2">


        <div class="p-6 bg-white shadow-md rounded-xl">
            <h3 class="pb-3 mb-4 text-lg font-semibold border-b">Grafik Layanan Bulan Ini</h3>
            <div class="min-h-[250px]">
                <canvas id="serviceChart"></canvas>
            </div>
            <div class="flex justify-between pt-2 mt-4 text-sm border-t">
                <span class="text-gray-500">Total Layanan</span>
                <span class="font-semibold">156 layanan</span>
            </div>
        </div>


        <div class="p-6 bg-white shadow-md rounded-xl">
            <h3 class="pb-3 mb-4 text-lg font-semibold border-b">Grafik Obat Terlaris</h3>
            <div class="min-h-[250px]">
                <canvas id="medicineChart"></canvas>
            </div>
            <div class="flex justify-between pt-2 mt-4 text-sm border-t">
                <span class="text-gray-500">Total Obat Terdistribusi</span>
                <span class="font-semibold">373 unit</span>
            </div>
        </div>

    </div>

@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            new Chart(document.getElementById('userActivityChart'), {
                type: 'line',
                data: {
                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    datasets: [{
                        data: [40, 55, 70, 60, 80, 65, 50],
                        borderColor: '#20B2AA',
                        backgroundColor: 'rgba(32,178,170,0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            new Chart(document.getElementById('serviceChart'), {
                type: 'bar',
                data: {
                    labels: ['Umum', 'Gigi', 'Anak'],
                    datasets: [{
                        data: [85, 40, 25],
                        backgroundColor: '#FB923C'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            new Chart(document.getElementById('medicineChart'), {
                type: 'bar',
                data: {
                    labels: ['Parasetamol', 'Amoxicilin', 'Vitamin', 'Antibiotik'],
                    datasets: [{
                        data: [90, 55, 48, 35],
                        backgroundColor: '#EC4899'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

        });
    </script>
@endpush
