@extends('layouts.app')

@section('title', 'contractcourses')

@section('content')

<form action="/contractcourses/{{ $contractcourse['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mahasiswa_id" aria-describedby="emailHelp" value="{{ old('mahasiswa_id') ? old('mahasiswa_id') : $contractcourse['mahasiswa_id'] }}">
    @error('mahasiswa_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Semester</label>
    <input type="text" class="form-control" name="semester_id" id="emailHelp" value="{{ old('semester_id') ? old('semester_id') : $contractcourse['semester_id'] }}">
    @error('semester_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
