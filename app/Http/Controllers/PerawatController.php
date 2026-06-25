<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\MedicalRecord;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('patient')
            ->orderBy('tanggal')
            ->orderBy('jam')
            ->get();

        return view(
            'dashboard.perawat.dashboardperawat',
            compact('reservations')
        );
    }

    public function create($id)
    {
        $reservation = Reservation::with('patient')->findOrFail($id);

        return view(
            'dashboard.perawat.pemeriksaanawal',
            compact('reservation')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'tensi'          => 'required|string|max:50',
            'suhu'           => 'required|numeric',
            'bb'             => 'required|numeric',
            'tb'             => 'required|numeric',
            'catatan'        => 'nullable|string',
        ]);

        $reservation = Reservation::with('patient')
            ->findOrFail($request->reservation_id);

        /*
        |--------------------------------------------------------------------------
        | Buat Medical Record dulu
        |--------------------------------------------------------------------------
        | Karena tabel vital_signs butuh medical_record_id
        */

        $medicalRecord = MedicalRecord::create([
            'patient_id' => $reservation->patient_id,
            'doctor_id' => $reservation->doctor_id,
            'tanggal_kunjungan' => $reservation->tanggal,
            'diagnosa' => null,
            'tindakan' => null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Simpan ke tabel vital_signs
        |--------------------------------------------------------------------------
        */

        VitalSign::create([
            'medical_record_id' => $medicalRecord->id,
            'tekanan_darah'     => $request->tensi,
            'suhu'              => $request->suhu,
            'berat_badan'       => $request->bb,
            'tinggi_badan'      => $request->tb,
            'catatan'           => $request->catatan,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update status reservasi (opsional, data reservasi tetap ada)
        |--------------------------------------------------------------------------
        */

        $reservation->update([
            'status' => 'menunggu_dokter'
        ]);

        return redirect()
            ->route('dashboard.perawat.antrianpemeriksaanawal')
            ->with(
                'success',
                'Vital sign berhasil disimpan dan diteruskan ke dokter'
            );
    }

    public function antrian()
    {
        $reservations = Reservation::with('patient')
            ->orderBy('tanggal')
            ->orderBy('jam')
            ->get();

        return view(
            'dashboard.perawat.antrianpemeriksaanawal',
            compact('reservations')
        );
    }
}
