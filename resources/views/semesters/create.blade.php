@extends('layouts.app')

@section('title', 'semesters')

@section('content')

<form action="/semesters" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">semester</label>
    <input type="text" class="form-control" name="semester" id="emailHelp" value="{{ old('semester') }}">
    @error('semester')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection