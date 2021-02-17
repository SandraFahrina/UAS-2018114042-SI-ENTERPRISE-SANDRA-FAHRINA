<?php

namespace App\Http\Controllers\Api;
use App\Models\schedules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = schedules::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'schedules berhasil ditambahkan',
            'data' => $schedules
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
            'id' => 'required',
            'jadwal' => 'required|unique:schedules|max:255',
            'matakuliah_id' => 'required',
            
        ]);

        schedules::find($id)->update([
            'id' => $request->id,
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id


        ]);

        if($schedules)
        {
            return response()->json([
                'success' => true,
                'message' => 'schedules berhasil ditambahkan',
                'data' => $schedules
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'schedules gagal ditambahkan',
                'data' => $schedules
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
        $schedules = schedules::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'schedules berhasil ditambahkan',
            'data' => $schedules
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
            'id' => 'required',
            'jadwal' => 'required|unique:schedules|max:255',
            'matakuliah_id' => 'required',
            
        ]);
         
        $schedules = schedules::find($id)->update([
            'id' => $request->id,
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id
        
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $schedules
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
        $cek = schedules::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
