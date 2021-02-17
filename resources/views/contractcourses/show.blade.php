@extends('layouts.app')

@section('title', 'contractcourse')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Mahasiswa : {{ $contractcourse['mahasiswa_id'] }}</h3>
                <h3>Semester : {{ $contractcourse['semester_id'] }}</h3>
               
    </div>
</div>
@endsection
