@extends('layouts.app')

@section('title', 'schedules')

@section('content')

<form action="/schedules" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">id</label>
    <input type="text" class="form-control" name="id" id="emailHelp" value="{{ old('id') }}">
    @error('id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Jadwal</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jadwal" aria-describedby="emailHelp" value="{{ old('jadwal') }}">
    @error('jadwal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mata kuliah</label>
    <input type="text" class="form-control" name="matakuliah_id" id="emailHelp" value="{{ old('matakuliah_id') }}">
    @error('matakuliah_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection