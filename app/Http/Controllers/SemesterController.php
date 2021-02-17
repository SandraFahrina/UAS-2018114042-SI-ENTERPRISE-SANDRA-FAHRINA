<?php

namespace App\Http\Controllers;
use App\models\semesters;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = semesters::OrderBy('id', 'desc')->paginate(3);
        return view('semesters.index', compact('semesters'));
    }
    public function create(Request $request, $id=null)
    {
        return view('semesters.create');

    }
    public function store(Request $request )
    {
    // validate the request...
    $request->validate([
        'semester' => 'required|unique:semesters|max:255',
 

    ]);

    $semesters = new semesters;

    $semesters->semester = $request->semester;


    $semesters->save();

        return redirect('/semesters');
    }

    public function show($id)
    {
        $semester = semesters::where('id', $id)->first();
        return view('semesters.show', ['semester' => $semester]);
    }

    public function edit($id)
    {
        $semester = semesters::where('id', $id)->first();
        return view('semesters.edit', ['semester' => $semester]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'semester' => 'required|unique:semesters|max:255',


    ]);

    semesters::find($id)-> update([

            'semester' => $request->semester
            
        ]);

        return redirect('/semesters');
    }
    public function destroy($id)
    {
        semesters::find($id)->delete();
        return redirect('/semesters');
    }
}
