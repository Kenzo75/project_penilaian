@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Siswa</div>

                    <div class="card-body">
                        <form action="/siswa" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control" id="nama" name="nama" type="text" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nisn">NISN</label>
                                <input class="form-control" id="nisn" name="nisn" type="text" value="{{ old('nisn') }}">
                                @error('nisn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password" value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="kelas">Kelas</label>
                                <select name="kelas" class="form-control">
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                @error('kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jurusan">Jurusan</label>
                                <select name="jurusan" class="form-control">
                                    <option value="PPLG">PPLG</option>
                                    <option value="TKJT">TKJT</option>
                                    <option value="DKV">DKV</option>
                                    <option value="Ak">Ak</option>
                                    <option value="TO">To</option>
                                    <option value="TBSM">TBSM</option>
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
