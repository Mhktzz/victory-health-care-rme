@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')


    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

        <div class="p-6 bg-white border shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pasien</p>
                    <h3 class="text-2xl font-bold">25</h3>
                </div>
                <div class="p-3 text-white rounded-lg bg-[#519D9E]">
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <hr class="my-3">

            <div class="flex items-center justify-between">
                <p class="text-xs text-gray-400">+2.5k this week</p>
                <p class="text-xs font-medium text-green-600">+10%</p>
            </div>
        </div>


        <div class="p-6 bg-white border shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Kunjungan Hari Ini</p>
                    <h3 class="text-2xl font-bold">0</h3>
                </div>
                <div class="p-3 text-white rounded-lg bg-[#2F7F7F]">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>

            <hr class="my-3">

            <div class="flex items-center justify-between">
                <p class="text-xs text-gray-400">+2.5k this week</p>
                <p class="text-xs font-medium text-green-600">+10%</p>
            </div>
        </div>


        <div class="p-6 bg-white border shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Rekam Medis</p>
                    <h3 class="text-2xl font-bold">20</h3>
                </div>
                <div class="p-3 text-white bg-pink-500 rounded-lg">
                    <i class="fas fa-file-medical"></i>
                </div>
            </div>

            <hr class="my-3">

            <div class="flex items-center justify-between">
                <p class="text-xs text-gray-400">+2.5k this week</p>
                <p class="text-xs font-medium text-green-600">+10%</p>
            </div>
        </div>

        <div class="p-6 bg-white border shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Selesai Diperiksa</p>
                    <h3 class="text-2xl font-bold">0</h3>
                </div>
                <div class="p-3 text-white bg-orange-500 rounded-lg">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>

            <hr class="my-3">

            <div class="flex items-center justify-between">
                <p class="text-xs text-gray-400">+2.5k this week</p>
                <p class="text-xs font-medium text-green-600">+10%</p>
            </div>
        </div>

    </div>


    <div class="p-6 mt-8 bg-white border shadow-sm rounded-xl">
        <h3 class="mb-4 font-semibold">Distribusi Layanan</h3>

        @php
            $services = [
                ['name' => 'Klinik Umum', 'value' => 22, 'color' => 'bg-[#519D9E]'],
                ['name' => 'Klinik Gigi', 'value' => 2, 'color' => 'bg-[#2F7F7F]'],
                ['name' => 'Spesialis Anak', 'value' => 1, 'color' => 'bg-pink-500'],
                ['name' => 'Homecare', 'value' => 0, 'color' => 'bg-gray-300'],
            ];
        @endphp

        @foreach ($services as $service)
            <div class="mb-4">
                <div class="flex justify-between mb-1 text-sm">
                    <span>{{ $service['name'] }}</span>
                    <span>{{ $service['value'] }} pasien</span>
                </div>
                <div class="w-full h-2 bg-gray-200 rounded-full">
                    <div class="h-2 rounded-full {{ $service['color'] }}" style="width: {{ $service['value'] * 4 }}%">
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="p-6 mt-8 bg-white border shadow-sm rounded-xl">
        <h3 class="mb-4 font-semibold">Grafik Kunjungan 12 Bulan Terakhir</h3>

        <div class="h-[300px]">
            <canvas id="visitChart"></canvas>
        </div>

        <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
            <div>
                <p class="text-sm text-gray-500">Rata-rata per Bulan</p>
                <p class="font-semibold">455 kunjungan</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Tahun Ini</p>
                <p class="font-semibold">5,464 kunjungan</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Pertumbuhan</p>
                <p class="font-semibold text-green-600">+15.2%</p>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        const ctx = document.getElementById('visitChart');

        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Jumlah Kunjungan',
                        data: [320, 300, 420, 380, 450, 430, 500, 480, 530, 490, 560, 540],
                        borderColor: '#519D9E',
                        backgroundColor: 'rgba(81, 157, 158, 0.15)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#519D9E'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 100
                            }
                        }
                    }
                }
            });
        }
    </script>
@endpush
