<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PerformadokterController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->get();

        return view('dashboard.manajer.performadokter.index', compact('patients'));
    }
}
