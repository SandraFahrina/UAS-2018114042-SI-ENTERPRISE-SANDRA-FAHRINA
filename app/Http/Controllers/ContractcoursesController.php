<?php

namespace App\Http\Controllers;
use App\models\contractcourses;
use Illuminate\Http\Request;

class ContractcoursesController extends controller
{
    
public function index()
{
    $contractcourses = contractcourses::OrderBy('id', 'desc')->paginate(3);
    return view('contractcourses.index', compact('contractcourses'));
}
public function create()
{
    return view('contractcourses.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'mahasiswa_id' => 'required|unique:contractcourses|max:255',
        'semester_id' => 'required',

    ]);

    $contractcourses = new contractcourses;

    $contractcourses->mahasiswa_id = $request->mahasiswa_id;
    $contractcourses->semester_id = $request->semester_id;

    $contractcourses->save();

        return redirect('/contractcourses');
    }

    public function show($id)
    {
        $contractcourse = contractcourses::where('id', $id)->first();
        return view('contractcourses.show', ['contractcourse' => $contractcourse]);
    }

    public function edit($id)
    {
        $contractcourse = contractcourses::where('id', $id)->first();
        return view('contractcourses.edit', ['contractcourse' => $contractcourse]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'mahasiswa_id' => 'required|unique:contractcourses|max:255',
        'semester_id' => 'required',

    ]);

    contractcourses::find($id)-> update([

            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id
            
        ]);

        return redirect('/contractcourses');
    }
    public function destroy($id)
    {
        contractcourses::find($id)->delete();
        return redirect('/contractcourses');
    }
}
