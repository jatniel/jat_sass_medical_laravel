<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctors.index');
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->lastname = $request->lastname;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->save();

        return redirect()->route('doctors.index');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->lastname = $request->lastname;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->save();

        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctors.index');
    }
}
