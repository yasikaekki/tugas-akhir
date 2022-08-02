<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Akun';
        $uid = Auth::id();
        $akun = User::find($uid);

        return view('profil.index', compact('judul', 'akun','uid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('errors.404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function submit(Request $request,$id)
    {
        $this->validate($request, [
            'foto_profil' => 'required',
            'foto_ttd' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ],
        [
            'foto_profil.required' => 'Foto profil harus diupload',
            'foto_ttd.required' => 'Foto ttd harus diupload',
            'jenis_kelamin.required' => 'Kolom ini harus diisi',
            'tempat_lahir.required' => 'Kolom ini harus diisi',
            'tanggal_lahir.required' => 'Kolom ini harus diisi',
        ]
        );

        $user=User::find($id);
        $user->name = $request->name;

        if ($request->hasFile('foto_profil')) {
            $file_foto = $request->file('foto_profil');
            $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
            $upload_foto = 'assets/foto profil/';
            $file_foto->move($upload_foto, $nama_foto);
            $user->foto_profil = $nama_foto;
        }

        if ($request->hasFile('foto_ttd')) {
            $file_ttd = $request->file('foto_ttd');
            $nama_ttd = time() . "." . $file_ttd->getClientOriginalExtension();
            $upload_ttd = 'assets/foto ttd/';
            $file_ttd->move($upload_ttd, $nama_ttd);
            $user->foto_ttd = $nama_ttd;
        }

        $user->gelar=$request->gelar;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir= $request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('profil.index')->with('sukses', 'Akun '. $user->name .' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $judul = 'Lengkapi Akun';

        $data = Crypt::decrypt($id);
        $akun = User::find($data);

        return view('profil.edit', compact('judul', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        $user=User::find($id);
        $user->name = $request->name;

        if ($request->hasFile('foto_profil')) {
            $file_foto = $request->file('foto_profil');
            $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
            $upload_foto = 'assets/foto profil/';
            $file_foto->move($upload_foto, $nama_foto);
            $user->foto_profil = $nama_foto;
        }

        if ($request->hasFile('foto_ttd')) {
            $file_ttd = $request->file('foto_ttd');
            $nama_ttd = time() . "." . $file_ttd->getClientOriginalExtension();
            $upload_ttd = 'assets/foto ttd/';
            $file_ttd->move($upload_ttd, $nama_ttd);
            $user->foto_ttd = $nama_ttd;
        }

        $user->gelar=$request->gelar;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir= $request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('profil.index')->with('sukses', 'Akun '. $user->name .' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
