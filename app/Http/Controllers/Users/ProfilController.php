<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
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

        return view('profil.index', compact('judul', 'akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        $this->validate($request, [
            'gambar_profil'=> 'required',
            'gambar_ttd'=> 'required',
        ],
        [
            'gambar_profil.required'=> 'Foto profil harus diisi',
            'gambar_ttd.required'=> 'Foto ttd harus diisi',
        ]
    );
            
        $user=User::find($id);
        $user->name = $request->name;
        
        $file_foto = $request->file('gambar_profil');
        $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
        $upload_foto = 'assets/foto profil/';
        $file_foto->move($upload_foto, $nama_foto);
        $user->gambar_profil = $nama_foto;

        $file_ttd = $request->file('gambar_ttd');
        $nama_ttd = time() . "." . $file_ttd->getClientOriginalExtension();
        $upload_ttd = 'assets/foto ttd/';
        $file_ttd->move($upload_ttd, $nama_ttd);
        $user->gambar_ttd = $nama_ttd;

        $user->gelar=$request->gelar;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir= \Carbon\Carbon::parse($request->tanggal_lahir)->translatedFormat("d F Y");
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;

        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('profil.index')->with('sukses', 'Akun '. $user->name .' berhasil dilengkapi');
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
