@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Siswa</div>

                    <div class="card-body">
                        <form action="/siswa/{{ $editsiswa->id }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control" id="nama" name="nama" type="text"
                                    value="{{ $editsiswa->user->name }}">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nisn">NISN</label>
                                <input class="form-control" id="nisn" name="nisn" type="text"
                                    value="{{ $editsiswa->nisn }}">
                                @error('nisn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email"
                                    value="{{ $editsiswa->user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="kelas">Kelas</label>
                                <select name="kelas" class="form-control">
                                    <option value="10" @if ($editsiswa->kelas == '10') selected @endif>10</option>
                                    <option value="11"@if ($editsiswa->kelas == '11') selected @endif>11</option>
                                    <option value="12" @if ($editsiswa->kelas == '12') selected @endif>12</option>
                                </select>
                                @error('kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jurusan">Jurusan</label>
                                <select name="jurusan" class="form-control">
                                    <option value="PPLG" @if ($editsiswa->jurusan == 'PPLG') selected @endif>PPLG</option>
                                    <option value="TKJT" @if ($editsiswa->jurusan == 'TKJT') selected @endif>TKJT</option>
                                    <option value="DKV" @if ($editsiswa->jurusan == 'DKV') selected @endif>DKV</option>
                                    <option value="Ak" @if ($editsiswa->jurusan == 'AK') selected @endif>Ak</option>
                                    <option value="TO" @if ($editsiswa->jurusan == 'TO') selected @endif>To</option>
                                    <option value="TBSM" @if ($editsiswa->jurusan == 'TBSM') selected @endif>TBSM</option>
                                </select>
                                @error('jurusan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
