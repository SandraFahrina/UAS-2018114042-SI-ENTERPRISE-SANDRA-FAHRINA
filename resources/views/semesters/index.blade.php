@extends('layouts.app')

@section('title', 'semester')
@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
  <a href="/semesters/create" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah semester</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
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
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">Semester</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($semesters as $semester)
        <tr>
        <td>{!!$semester->semester !!}</td>

        <td>
        <a href="/semesters/{{$semester->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
        <form action="/semesters/{{$semester->id}}" method="POST">
        @csrf
        @method('DELETE')
        <td><button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini')">Delete</button></td>
        </form>
        </tr>
      @endforeach
      </tbody>
    </table>
</div>
  <div>
    {{ $semesters -> links() }}
  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
@endsection
