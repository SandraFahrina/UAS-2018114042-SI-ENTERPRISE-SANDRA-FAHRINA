@extends('layouts.app')

@section('title', 'schedules')

@section('content')

<form action="/schedules/{{ $schedule['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" value="{{ old('id') ? old('id') : $schedule['id'] }}">
    @error('id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Jadwal</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jadwal" aria-describedby="emailHelp" value="{{ old('jadwal') ? old('jadwal') : $schedule['jadwal'] }}">
    @error('jadwal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mata kuliah</label>
    <input type="text" class="form-control" name="matakuliah_id" id="emailHelp" value="{{ old('matakuliah_id') ? old('matakuliah_id') : $schedule['matakuliah_id'] }}">
    @error('matakuliah_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection