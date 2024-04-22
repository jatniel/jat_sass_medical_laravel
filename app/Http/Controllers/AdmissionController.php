<?php

namespace App\Http\Controllers;

use App\Models\admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    // List all admissions
    public function index()
    {
        return view('admissions.index');
    }

    // Export all admissions
    public function export()
    {
        return view('admissions.export');
    }

    // Create a new admission
    public function create()
    {
        return view('admissions.create');
    }
    // Store a new admission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $admission = new Admission();
        $admission->name = $request->name;
        $admission->lastname = $request->lastname;
        $admission->email = $request->email;
        $admission->phone = $request->phone;
        $admission->save();

        return redirect()->route('admissions.index');
    }
    // Edit an admission
    public function edit($id)
    {
        $admission = Admission::find($id);
        return view('admissions.edit', compact('admission'));
    }
    // Update an admission
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $admission = Admission::find($id);
        $admission->name = $request->name;
        $admission->lastname = $request->lastname;
        $admission->email = $request->email;
        $admission->phone = $request->phone;
        $admission->save();

        return redirect()->route('admissions.index');
    }
    // Delete an admission
    public function destroy($id)
    {
        $admission = Admission::find($id);
        $admission->delete();
    }
}
