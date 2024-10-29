<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($req, $next) {
            if (Auth::user()->peran != 'guru') {
                abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini');
            }
            return $next($req);
        });
    }

    public function index()
    {
        $semuasiswa = Siswa::all();
        return view('siswa.index')->with('semuasiswa', $semuasiswa);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'kelas' => 'required|integer',
            'jurusan' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nisn.required' => 'NISN harus diisi',
            'nisn.numberic' => 'NISN harus berupa angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.integer' => 'Kelas harus berupa angka',
            'jurusan.required' => 'Jurusan harus diisi',
        ]);

        $simpan = new User();
        $simpan->name = $req->nama;
        $simpan->email = $req->email;
        $simpan->password = bcrypt($req->password);
        $simpan->peran = 'siswa';
        $simpan->save();

        $simpansiswa = new Siswa();
        $simpansiswa->user_id = $simpan->id;
        $simpansiswa->nisn = $req->nisn;
        $simpansiswa->kelas = $req->kelas;
        $simpansiswa->jurusan = $req->jurusan;
        $simpansiswa->save();

        Alert::success('Berhasil', 'Berhasil Menyimpan Data');
        return redirect('/siswa');
    }

    public function edit($id)
    {
        $editsiswa = Siswa::find($id);
        return view('siswa.edit')->with('editsiswa', $editsiswa);
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'email' => 'required|email|unique:users,email,' . Siswa::find($id)->user_id,
            'kelas' => 'required|integer',
            'jurusan' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nisn.required' => 'NISN harus diisi',
            'nisn.numberic' => 'NISN harus berupa angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.integer' => 'Kelas harus berupa angka',
            'jurusan.required' => 'Jurusan harus diisi',
        ]);
        $userId = Siswa::find($id)->user_id;
        $siswaId = Siswa::find($id)->id;

        $simpan = User::find($userId);
        $simpan->name = $req->nama;
        $simpan->email = $req->email;
        if ($req->password != null) {
            $simpan->password = bcrypt($req->password);
        }
        $simpan->peran = 'siswa';
        $simpan->save();

        $simpansiswa = Siswa::find($siswaId);
        $simpansiswa->user_id = $simpan->id;
        $simpansiswa->nisn = $req->nisn;
        $simpansiswa->kelas = $req->kelas;
        $simpansiswa->jurusan = $req->jurusan;
        $simpansiswa->save();

        Alert::info('Berhasil', 'Data Siswa Berhasil Diupdate');
        return redirect('/siswa');
    }

    public function destroy($id)
    {
        $userId = Siswa::find($id)->user_id;
        $siswaId = Siswa::find($id)->id;

        Siswa::destroy($siswaId);
        User::destroy($userId);

        Alert::toast('Berhasil Menghapus', 'success');
        return redirect('/siswa');
    }
}
