@extends('layouts.app')

@section('title', 'student')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>id : {{ $student['id'] }}</h3>
                <h3>Nama mahasiswa : {{ $student['nama_mahasiswa'] }}</h3>
                <h3>Alamat : {{ $student['alamat'] }}</h3>
                <h3>No Telp : {{ $student['no_tlp'] }}</h3>
                <h3>Email : {{ $student['email'] }}</h3>
               
    </div>
</div>
@endsection
