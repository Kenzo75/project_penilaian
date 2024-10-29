@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Siswa</div>

                    <div class="card-body">
                        <a href="/siswa/create" class="btn btn-primary">Tambah Siswa</a>
                        <hr>
                        <table class="table-hover table ">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Aksi</th>
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
                                            <a class="btn btn-warning" href="/siswa/{{ $siswa->id }}/edit">Edit</a>
                                            <form action="/siswa/{{ $siswa->id }}" class="d-inline" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
