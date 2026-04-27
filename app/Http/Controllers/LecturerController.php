<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lecturer.index', [
            'title' => 'Lecturer',
            'lecturer' => Lecturer::latest()->get(),
            //'lecturers' => Lecturer::orderBy('name', 'asc')->get(),
            ]);
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create', [
            'title' => 'Create Lecturer',
            'departments' => Department::latest()->get(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'department_id' => 'required|exists:departments,id',
    ], [
        'name.required' => 'Nama Tidak Boleh Kosong',
        'name.max' => 'Nama Maksimal 255 Karakter',
        'department_id.required' => 'Program Studi Tidak Boleh Kosong',
        'department_id.exists' => 'Program Studi Yang Dipilih Tidak Ditemukan',
    ]);

    Lecturer::create($validated);
 
    return to_route('lecturer.index')->withSuccess('Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturer.edit', [
            'title' => 'Edit Lecturer',
            'departments' => Department::latest()->get(),
            'lecturer' => $lecturer, 
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'department_id' => 'required|exists:departments,id',
    ], [
        'name.required' => 'Nama Tidak Boleh Kosong',
        'name.max' => 'Nama Maksimal 255 Karakter',
        'department_id.required' => 'Program Studi Tidak Boleh Kosong',
        'department_id.exists' => 'Program Studi Yang Dipilih Tidak Ditemukan',
    ]);

    $lecturer->update($validated);
    return to_route('lecturer.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete($lecturer);
        return to_route('lecturer.index')->withSuccess('Data Berhasil Dihapus'); 
    }
}
