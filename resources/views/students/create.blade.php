@extends('layouts.app')

@section('title', 'students')

@section('content')

<form action="/students" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" value="{{ old('id') }}">
    @error('id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Mahasiswa</label>
    <input type="text" class="form-control" name="nama_mahasiswa" id="emailHelp" value="{{ old('nama_mahasiswa') }}">
    @error('nama_mahasiswa')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="emailHelp" value="{{ old('alamat') }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No Telp</label>
    <input type="text" class="form-control" name="no_tlp" id="emailHelp" value="{{ old('no_tlp') }}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" id="emailHelp" value="{{ old('email') }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection