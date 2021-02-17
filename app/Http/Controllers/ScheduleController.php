<?php

namespace App\Http\Controllers;
use App\models\schedules;
use Illuminate\Http\Request;

class ScheduleController extends controller
{

    public function index()
    {
        $schedules = schedules::OrderBy('id', 'desc')->paginate(3);
    
        return view('schedules.index', compact('schedules'));
    }
    public function create()
    {
        return view('schedules.create');
    }
    public function store(Request $request )
    {
        // validate the request...
        $request->validate([
            'id' => 'required',
            'jadwal' => 'required|unique:schedules|max:255',
            'matakuliah_id' => 'required',
    
        ]);
    
        $schedules = new schedules;
    
        $schedules->id = $request->id;
        $schedules->jadwal = $request->jadwal;
        $schedules->matakuliah_id = $request->matakuliah_id;
    
        $schedules->save();
    
            return redirect('/schedules');
        }
    
        public function show($id)
        {
            $schedule = schedules::where('id', $id)->first();
            return view('schedules.show', ['schedule' => $schedule]);
        }
    
        public function edit($id)
        {
            $schedule = schedules::where('id', $id)->first();
            return view('schedules.edit', ['schedule' => $schedule]);
        }
    
        public function update(Request $request, $id)
        {
            $request->validate([
            'id' => 'required',
            'jadwal' => 'required|unique:schedules|max:255',
            'matakuliah_id' => 'required',
    
        ]);
    
            schedules::find($id)-> update([
    
                'id' => $request->id,
                'jadwal' => $request->jadwal,
                'matakuliah_id' => $request->matakuliah_id
                
            ]);
    
            return redirect('/schedules');
        }
        public function destroy($id)
        {
            schedules::find($id)->delete();
            return redirect('/schedules');
        }
    }