@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nilai</div>

                    <div class="card-body">
                        <form action="/nilai" method="POST">
                            @csrf
                            <table class="table-hover table ">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuasiswa as $siswa)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $siswa->user->name }}</td>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->kelas }}</td>
                                            <td>{{ $siswa->jurusan }}</td>
                                            <td>
                                                <input type="number"
                                                    class="form-control @error('nilai.' . $siswa->id . '.0') is-invalid @enderror"
                                                    name="nilai[{{ $siswa->id }}][]"
                                                    value="{{ optional($siswa->nilai)->nilai }}">
                                                @error('nilai.' . $siswa->id . '.0')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
