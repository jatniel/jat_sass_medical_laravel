<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // List all patients
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    // Create a new patient
    public function create()
    {
        return view('patients.create');
    }

    // Store a new patient
    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->lastname = $request->lastname;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->save();

        return redirect()->route('patients.index');
    }

    // Edit a patient
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update a patient
    public function update(Request $request, Patient $patient)
    {
        $patient->name = $request->name;
        $patient->lastname = $request->lastname;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->save();

        return redirect()->route('patients.index');
    }

    // Delete a patient
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index');
    }

}
