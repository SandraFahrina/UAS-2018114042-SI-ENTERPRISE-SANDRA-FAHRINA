@extends('layouts.app')

@section('title', 'semesters')

@section('content')

          <form action="/semesters/{{ $semester['id'] }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleInputEmail1">semester</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="semester" aria-describedby="emailHelp" value="{{ old('semester') ? old('semester') : $semester['semester'] }}">
              @error('semester')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
@endsection          