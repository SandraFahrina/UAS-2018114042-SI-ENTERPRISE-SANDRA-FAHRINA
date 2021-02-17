<?php

namespace App\Http\Controllers\Api;
use App\Models\contractcourses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractcoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractcourses = contractcourses::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'contractcourses berhasil ditambahkan',
            'data' => $contractcourses
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|unique:contractcourses|max:255',
            'semester_id' => 'required',
            
        ]);

        contractcourses::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id


        ]);

        if($contractcourses)
        {
            return response()->json([
                'success' => true,
                'message' => 'contractcourses berhasil ditambahkan',
                'data' => $contractcourses
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'contractcourses gagal ditambahkan',
                'data' => $contractcourses
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
      {
        $contractcourses = contractcourses::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'contractcourses berhasil ditambahkan',
            'data' => $contractcourses
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required|unique:contractcourses|max:255',
            'semester_id' => 'required',
            
        ]);
         
        $contractcourses = contractcourses::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id
        
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $contractcourses
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = contractcourses::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
