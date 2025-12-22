namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;

class StatusKunjunganController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $kunjungan = Reservasi::with('patient')
            ->whereDate('tanggal', $today)
            ->orderBy('jam')
            ->get();

        $menunggu = $kunjungan->where('status', 'Menunggu');
        $diproses = $kunjungan->where('status', 'Diproses');
        $selesai  = $kunjungan->where('status', 'Selesai');

        return view('dashboard.pendaftaran.status_kunjungan.index', [
            'menunggu' => $menunggu,
            'diproses' => $diproses,
            'selesai'  => $selesai,
        ]);
    }
}
