@extends('layouts.app')

@section('title', 'presents')

@section('content')

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
    <input type="time" class="form-control @error('waktu_absen') is-invalid @enderror" name="waktu_absen" value="{{ old('waktu_absen') }}">
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

@endsection