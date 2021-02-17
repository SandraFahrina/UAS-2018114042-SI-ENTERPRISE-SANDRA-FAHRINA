<?php

namespace App\Http\Controllers\Api;
use App\Models\semesters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = semesters::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'semesters berhasil ditambahkan',
            'data' => $semesters
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
            'semester' => 'required|unique:semesters|max:255',
     
            
        ]);

        semesters::find($id)->update([
            'semester' => $request->semester


        ]);

        if($semesters)
        {
            return response()->json([
                'success' => true,
                'message' => 'semesters berhasil ditambahkan',
                'data' => $semesters
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'semesters gagal ditambahkan',
                'data' => $semesters
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
        $semesters = semesters::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'semesters berhasil ditambahkan',
            'data' => $semesters
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
            'semester' => 'required|unique:semesters|max:255',
          
            
        ]);
         
        $semesters = semesters::find($id)->update([
            'semester' => $request->semester
        
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $semesters
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
        $cek = semesters::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
