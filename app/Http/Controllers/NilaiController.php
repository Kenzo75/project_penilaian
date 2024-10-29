<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiController extends Controller
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
        $siswa = Siswa::with('nilai')->get();
        return view('nilai.index')->with('semuasiswa', $siswa);
    }

    public function store(Request $req)
    {
        foreach ($req->nilai as $siswaid => $nilai) {
            $this->validate($req, [
                'nilai.' . $siswaid . '.0' => 'required|numeric|min:0|max:100',
            ], [
                'nilai.' . $siswaid . '.0.required' => 'Nilai harus diisi',
                'nilai.' . $siswaid . '.0.numeric' => 'Nilai harus berupaangka',
                'nilai.' . $siswaid . '.0.min' => 'Nilai minimal 0',
                'nilai.' . $siswaid . '.0.max' => 'Nilai maksimal 100',
            ]);
            Nilai::updateOrCreate(
                ['siswa_id' => $siswaid],
                [
                    'nilai' => $nilai[0],
                    'catatan' => ($nilai[0] >= 75) ? 'Lulus' : 'Tidak Lulus'
                ]
            );
        }
        Alert::success('Berhasil', 'Berhasil Mengupdate Nilai');
        return redirect('nilai');
    }
}
