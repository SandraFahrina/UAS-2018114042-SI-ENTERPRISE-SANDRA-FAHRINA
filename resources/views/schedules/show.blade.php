@extends('layouts.app')

@section('title', 'schedule')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>id : {{ $schedule['id'] }}</h3>
                <h3>Jadwal : {{ $schedule['jadwal'] }}</h3>
                <h3>mata kuliah : {{ $schedule['matakuliah_id'] }}</h3>
               
    </div>
</div>
@endsection
