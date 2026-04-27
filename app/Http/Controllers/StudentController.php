<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index', [
            'title' => 'Student',
            'student' => Student::latest()->get(),
            //'students' => Student::orderBy('name', 'asc')->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', ['title' => 'Create Student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|digits:11|numeric',
    ], [
        'name.required' => 'Nama Tidak Boleh Kosong',
        'name.max' => 'Nama Maksimal 255 Karakter',
        'nim.required' => 'NIM Tidak Boleh Kosong',
        'nim.digits' => 'NIM Harus 11 Digit',
        'nim.numeric' => 'NIM Harus Angka',
    ]
    );

    Student::create($validated);
    return to_route('student.index')->withSuccess('Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|digits:11|numeric',
    ], [
        'name.required' => 'Nama Tidak Boleh Kosong',
        'name.max' => 'Nama Maksimal 255 Karakter',
        'nim.required' => 'NIM Tidak Boleh Kosong',
        'nim.digits' => 'NIM Harus 11 Digit',
        'nim.numeric' => 'NIM Harus Angka',
    ]);

    $student->update($validated);
 
    return to_route('student.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete($student);
        return to_route('student.index')->withSuccess('Data Berhasil Dihapus');  
    }
}
