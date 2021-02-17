<?php

namespace App\Http\Controllers;
use App\models\students;
use Illuminate\Http\Request;

class StudentController extends controller
{
    
public function index()
{
    $students = students::OrderBy('id', 'desc')->paginate(3);

    return view('students.index', compact('students'));
}
public function create()
{
    return view('students.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'id' => 'required',
        'nama_mahasiswa' => 'required|unique:students|max:255',
        'alamat' => 'required',
        'no_tlp' => 'required',
        'email' => 'required',

    ]);

    $students = new students;

    $students->id = $request->id;
    $students->nama_mahasiswa = $request->nama_mahasiswa;
    $students->alamat = $request->alamat;
    $students->no_tlp = $request->no_tlp;
    $students->email = $request->email; 

    $students->save();

        return redirect('/students');
    }

    public function show($id)
    {
        $student = students::where('id', $id)->first();
        return view('students.show', ['student' => $student]);
    }

    public function edit($id)
    {
        $student = students::where('id', $id)->first();
        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'id' => 'required',
        'nama_mahasiswa' => 'required|unique:students|max:255',
        'alamat' => 'required',
        'no_tlp' => 'required',
        'email' => 'required',

    ]);

        students::find($id)-> update([

            'id' => $request->id,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email
        ]);

        return redirect('/students');
    }
    public function destroy($id)
    {
        students::find($id)->delete();
        return redirect('/students');
    }
}