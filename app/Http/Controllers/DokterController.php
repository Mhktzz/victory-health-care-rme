<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\MedicalRecord;
use App\Models\User;
use App\Models\MedicineStock;
use App\Models\Icd10;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    // Tampilkan daftar antrian (sederhana: daftar pasien)
    public function queue()
    {
        $patients = Patient::with(['medicalRecords' => function($q) { $q->orderBy('id', 'desc'); }])
            ->orderBy('id')
            ->limit(50)
            ->get();

        return view('dashboard.dokter.queue', compact('patients'));
    }

    // Buat rekam medis baru dan redirect ke form rekam medis
    public function callPatient($patientId)
    {
        $patient = Patient::findOrFail($patientId);

        $record = MedicalRecord::create([
            'patient_id' => $patient->id,
            'doctor_id' => Auth::id(),
            'tanggal_kunjungan' => now()->toDateString(),
            'status' => 'belum_lengkap'
        ]);

        return redirect()->route('dashboard.dokter.record', ['id' => $record->id]);
    }

    // Tampilkan form input rekam medis
    public function record($id)
    {
        $record = MedicalRecord::with(['patient', 'vitalSign'])->findOrFail($id);
        $icd10s = Icd10::all();
        return view('dashboard.dokter.record', compact('record', 'icd10s'));
    }

    // Simpan rekam medis
    public function storeRecord(Request $request, $id)
    {
        $record = MedicalRecord::findOrFail($id);

        $data = $request->validate([
            'keluhan_utama' => 'nullable|string',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
        ]);

        $record->update(array_merge($data, ['status' => 'lengkap']));

        // After saving, redirect to dashboard so the record appears in the history table
        return redirect()->route('dashboard.dokter')->with('success', 'Rekam medis disimpan.');
    }

    // Dashboard index: summary cards and recent completed records
    public function index()
    {
        $patientsToday = MedicalRecord::where('tanggal_kunjungan', now()->toDateString())->count();
        $totalPatients = Patient::count();
        $dokterActive = User::where('role', 'dokter')->count();
        $stokObat = MedicineStock::sum('stok');

        $records = MedicalRecord::with('patient')
            ->where('status', 'lengkap')
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard.dokter.index', compact('patientsToday', 'totalPatients', 'dokterActive', 'stokObat', 'records'));
    }
}
