@extends('layouts.app')

@section('title', 'presents')
@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
  <a href="/presents/create" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah present</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah present</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
          <form action="/presents" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">ID</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" value="{{ old('id') }}">
              @error('id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Waktu Absen</label>
              <input type="time" class="form-control" id="exampleInputEmail1" name="waktu_absen" aria-describedby="emailHelp" value="{{ old('waktu_absen') }}">
              @error('waktu_absen')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mahasiswa</label>
              <select name="students_id" class="form-control">
              <option value="">pilih</option>
              @foreach ($students as $item)
              <option value="{{$item->id}}">{{$item->nama_mahasiswa}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
                                <label>Matakuliah ID</label>
                                <select name="matakuliah_id" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value="Pemrograman Internet Lanjut"> Pemrograman Internet Lanjut </option>
                                            <option value="Pemrograman Android"> Pemrograman Android </option>
                                            <option value="Jaringan Komputer"> Jaringan Komputer </option>
                                            <option value="Manajemen Keamanan"> Manajemen Keamanan </option>
                                            <option value="Rekayasa Perangkat Lunak(RPL)"> Rekayasa Perangkat Lunak(RPL) </option>
                                    </select>
                                @error('matakuliah_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Keterangan</label>
              <br>
              <select name="example-select" required="true" data-placeholder="Select an option">
              <option value="">pilih</option>
                  <option value="opt1">Hadir</option>
                  <option value="opt2">Tidak Hadir</option>
                </select>
                </br>
                </div>
              </div>
            
              <center><button type="submit" class="btn btn-primary">Submit</button></center>
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
      <th scope="col">id</th>
        <th scope="col">Waktu Absen</th>
        <th scope="col">Mahasiswa Id</th>
        <th scope="col">Matakuliah Id</th>
        <th scope="col">Keterangan</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($presents as $present)
      <tr>
      <td>{{$present->id}}</td>
      <td>{{$present->waktu_absen}}</td>
      <td>{!!$present->mahasiswa_id !!}</td>
      <td>{!!$present->matakuliah_id !!}</td>
      <td>{!!$present->keterangan !!}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
      {{ $presents -> links() }}
      </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
@endsection